<?php
require_once('./_elements/simple_html_dom.php');
$curl = curl_init();
curl_setopt_array($curl, Array(
	CURLOPT_URL            => 'http://cattorreon.blogspot.com/feeds/posts/default?alt=rss',
	CURLOPT_USERAGENT      => 'spider',
	CURLOPT_TIMEOUT        => 120,
	CURLOPT_CONNECTTIMEOUT => 30,
	CURLOPT_RETURNTRANSFER => TRUE,
	CURLOPT_ENCODING       => 'UTF-8'
));
$data = curl_exec($curl);
curl_close($curl);
$xml = simplexml_load_string($data, 'SimpleXMLElement');
$feed = array();
$limit = 1;
$textlength = 700;
// die('<pre>' . print_r($xml, TRUE) . '</pre>');

foreach ($xml->channel->item as $node) {
	$creator = $node->children('dc', TRUE);
	$item = array (
		'title' => $node->title,
		'desc' => $node->description,
		'link' => $node->link,
		'date' => $node->pubDate,
		'author' => $creator,
	);
	array_push($feed,$item);
}




	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$nicedate = date('F j', strtotime($feed[$x]['date']));
		$date = date('c',strtotime($feed[$x]['date']));
	    $post = str_get_html($feed[$x]['desc']);
	    $first_img = $post->find('img', 0);
	    if($first_img !== null) {
	        $image = $first_img->src;
	    } else {
		    $image = "http://test.cathub.org/assets/news-noimg.jpg";
		}
		$text = trim($post->plaintext);
		if (strlen($text) > $textlength)
			{
		    	$text = wordwrap($text, $textlength);
				$text = substr($text, 0, strpos($text, "\n")) . '&hellip;';
			}

		echo '<h1 class="news-header">Latest News</h1>';
		echo '<p class="news-meta" itemprop="datePublished" content="'.$date.'">'.$nicedate.'</p>';
		echo '<h2 class="news-title" itemprop="headline">'.$title.'</h2>';
		echo '<p class="news-text" itemprop="articleBody">'.$text.'</p>';
		echo '<div class="news-more"><a href="'.$link.'">Read More</a> <i class="icon-chevron-double"></i></div></article>';
		echo '<figure class="news-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
		echo '<img src="'.$image.'" alt="Article Image">';
		echo '<meta itemprop="url" content="'.$image.'">';
		echo '<meta itemprop="width" content="1200"><meta itemprop="height" content="600"></figure>';


	}
?>