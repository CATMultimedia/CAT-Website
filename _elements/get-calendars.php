<?php
/* Base code provided by Sarah Bailey.
Case Western Reserve University, Cleveland OH.
Please do not email me for support. Post a comment instead.
Current v 1.1
Props to commenter Matt for pointing out the maxResults parameter.
*/

include(__DIR__.'/../google-api-php-client/src/Google/autoload.php');
//TELL GOOGLE WHAT WE'RE DOING
$client = new Google_Client();
$client->setApplicationName("CAT Calendars"); //DON'T THINK THIS MATTERS
$client->setDeveloperKey('AIzaSyCjgCYC9PbSF9RfuJdiiNAwNnsy61rs3kc'); //GET AT AT DEVELOPERS.GOOGLE.COM
$cal = new Google_Service_Calendar($client);
//THE CALENDAR ID, FOUND IN CALENDAR SETTINGS. IF YOUR CALENDAR IS THROUGH GOOGLE APPS
//YOU MAY NEED TO CHANGE THE CENTRAL SHARING SETTINGS. THE CALENDAR FOR THIS SCRIPT
//MUST HAVE ALL EVENTS VIEWABLE IN SHARING SETTINGS.
$calendarId = 'cat.mx_739f3kl5k85k9ekt4l7h8q59ic@group.calendar.google.com'; // ALL CAT EVENTS
$calendarId2 = 'cat.mx_3tk1f1cevauc1peloqduvain0s@group.calendar.google.com'; // ECH EVENTS
$calendarId3 = 'cat.mx_9unrjemuhto2tlsdnjr8uh1g9s@group.calendar.google.com'; // ES EVENTS
$calendarId4 = 'cat.mx_icuu2bnq9gs34i1fuklgnqf8mg@group.calendar.google.com'; // HS EVENTS
$calendarIdarray = array($calendarId, $calendarId2, $calendarId3, $calendarId4);
//TELL GOOGLE HOW WE WANT THE EVENTS
$params = array(
//CAN'T USE TIME MIN WITHOUT SINGLEEVENTS TURNED ON,
//IT SAYS TO TREAT RECURRING EVENTS AS SINGLE EVENTS
    'singleEvents' => true,
    'orderBy' => 'startTime',
    'timeMin' => date(DateTime::ATOM),//ONLY PULL EVENTS STARTING TODAY
	'maxResults' => 4 //ONLY USE THIS IF YOU WANT TO LIMIT THE NUMBER
                  //OF EVENTS DISPLAYED

);
//THIS IS WHERE WE ACTUALLY PUT THE RESULTS INTO A VAR
$events = $cal->events->listEvents($calendarId, $params);
$calTimeZone = $events->timeZone; //GET THE TZ OF THE CALENDAR

//SET THE DEFAULT TIMEZONE SO PHP DOESN'T COMPLAIN. SET TO YOUR LOCAL TIME ZONE.
 date_default_timezone_set($calTimeZone);

// UNCOMMENT THE FOLLOWING TO DEBUG THE XML
// echo '<pre>';
// print_r($events);
// echo '</pre>';
$countstep = 0;
$events_master = array(); // SET AN ARRAY TO HOLD ALL OF THE EVENTS

foreach (range(0,3) as $countstep) {
	$events = $cal->events->listEvents($calendarIdarray[$countstep], $params);
	$count = 1;
	$items_to_show = 4;


    foreach ($events->getItems() as $event) {
        //Convert date to month and day
        $eventDateStr = $event->start->dateTime;
        if(empty($eventDateStr)) {
             // it's an all day event
             $eventDateStr = $event->start->date;
        }
        $temp_timezone = $event->start->timeZone;
		//THIS OVERRIDES THE CALENDAR TIMEZONE IF THE EVENT HAS A SPECIAL TZ
        if (!empty($temp_timezone)) {
         	$timezone = new DateTimeZone($temp_timezone); //GET THE TIME ZONE
            //Set your default timezone in case your events don't have one
     	} else {
	     	$timezone = new DateTimeZone($calTimeZone);
		}


    	if($count <= $items_to_show) {
			$eventdate = new DateTime($eventDateStr,$timezone);
			$title_crop = substr($event->summary,4);
			$title = $event->summary;
			$location = $event->location;
			$organizer = $event->organizer->displayName;
			$link = $event->htmlLink;
	        $newmonth = $eventdate->format("M");//CONVERT REGULAR EVENT DATE TO LEGIBLE MONTH
	        $newday = $eventdate->format("d");//CONVERT REGULAR EVENT DATE TO LEGIBLE DAY
	        $newtime = $eventdate->format("H:i"); //CONVERT REGULAR EVENT TIME TO MILITARY TIME
			$newutc = $eventdate->format("c"); //CONVERT REGULAR EVENT TIME TO MILITARY TIME

			$events_master[] = array(
				"title" => $title,
				"location" => $location,
				"date" => $eventdate,
				"organizer" => $organizer,
				"link" => $link,
				"utc" => $newutc,
				"month" => $newmonth,
				"day" => $newday,
				"time" => $newtime
			);
		}
	}
}

function array_sort_by_column(&$array, $column, $direction = SORT_ASC) {
    $reference_array = array();

    foreach($array as $key => $row) {
        $reference_array[$key] = $row[$column];
    }

    array_multisort($reference_array, $direction, $array);
}
array_sort_by_column($events_master, 'date');

//echo '<pre>';
//print_r($events_master);
//echo '</pre>';

 //START THE LOOP TO LIST EVENTS
     foreach (array_slice($events_master,0,4) as $event) {
	     $newtime = $event['time'];
         $class = strtolower(substr($event['organizer'],1,2));
         if ($newtime=="00:00") {
	         $newtime = "All day";
         } else { $newtime = $newtime . ' hrs.';}

        ?>
            <article class="event evt-<?php echo $class;?>" itemscope itemtype="http://schema.org/Event">
		        <h3 class="event-date" itemprop="startDate" content="<?php echo $event['utc']; ?>"><?php echo $event['day']; ?><br><span><?php echo $event['month']; ?></span></h3>
		        <div class="event-info">
		            <p class="event-title" itemprop="name"><?php echo $event['title']; ?>
					<br><span>
					<?php
						if($class=="ec") { echo "Early Childhood";} elseif($class=="es"){ echo "Elementary";} elseif($class=="hs") {echo "High School";} else {echo "CAT Community";} ?>
					</span></p>
					<?php
						if(!empty($event['location'])) { ?>
							<p class="event-place" itemprop="description"><?php echo $event['location']; ?></p>
						<?php } ?>
		        </div>
		        <p class="event-hour"><?PHP echo $newtime; ?></p>
			</article>

<?php 		} ?>