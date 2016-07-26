<?php
session_start();
include 'config.php';
if( isset($_SESSION["gp_access_token"]) ){ // If logged in
	include 'login.func.php';
	$access_token = $_SESSION["gp_access_token"]; // User access token
	$api_url = "https://www.googleapis.com/plus/v1/people/me?fields=aboutMe%2Cemails%2Cimage%2Cname&access_token=$access_token"; // Do not change it!

	if( !isset($_SESSION["gp_result"]) ){
		$result = MyCAT_HTTP(0, $api_url, 0, 0);
		$_SESSION["gp_result"] = $result;
		$user_info = $_SESSION["gp_result"];
 	}else{
 		$user_info = $_SESSION["gp_result"];
 	}
	$first_name = $user_info['name']['givenName']; // User first name
	$last_name = $user_info['name']['familyName']; // User last name
	$email = $user_info['emails'][0]['value']; // User email
	$get_profile_image = $user_info['image']['url'];
	$change_image_size = str_replace("?sz=50", "?sz=$image_size", $get_profile_image);
	$profile_image_link = $change_image_size; // User profile image link
}


	$pagetitle = "MyCAT for Staff";
	include "../_elements/header.php";
	if( isset($_SESSION["gp_access_token"]) ){

	// #########################################
	// END HEADER SHOW LOGGED IN
	// #########################################
 ?>

 <main class="inside">
    <section class="inside-content">
	        <h1 class="page-title">Welcome to MyCAT</h1>
		<div class="content">
			<p class="page-hero">This is a page hero. Aenean varius augue convallis vestibulum natoque risus magna quisque fermentum.</p>
			<p>This is regular paragraph text. Augue pulvinar faucibus duis vulputate penatibus nullam suscipit iaculis commodo urna. Erat curae; placerat nunc vehicula. Himenaeos adipiscing ultrices elit suscipit, mattis praesent lobortis. Mi ligula molestie vel et lobortis elementum lectus tellus tempus enim. Vulputate quisque ante ridiculus etiam ultrices enim, litora dignissim elit volutpat quis class? Quam dictum rutrum netus.</p>

			<blockquote>
			  This is an example quotation that uses the blockquote tag. Augue pulvinar faucibus duis vulputate penatibus nullam suscipit iaculis commodo urna.
			</blockquote>

			<p>This is regular paragraph text. Augue pulvinar faucibus duis vulputate penatibus nullam suscipit iaculis commodo urna. Erat curae; placerat nunc vehicula. Himenaeos adipiscing ultrices elit suscipit, mattis praesent lobortis. Mi ligula molestie vel et lobortis elementum lectus tellus tempus enim. Vulputate quisque ante ridiculus etiam ultrices enim, litora dignissim elit volutpat quis class? Quam dictum rutrum netus.</p>
			<p>This is regular paragraph text. Augue pulvinar faucibus duis vulputate penatibus nullam suscipit iaculis commodo urna. Erat curae; placerat nunc vehicula. Himenaeos adipiscing ultrices elit suscipit, mattis praesent lobortis. Mi ligula molestie vel et lobortis elementum lectus tellus tempus enim. Vulputate quisque ante ridiculus etiam ultrices enim, litora dignissim elit volutpat quis class? Quam dictum rutrum netus.</p>

			<blockquote>
			  This is an example quotation that uses the blockquote tag. Augue pulvinar faucibus duis vulputate penatibus nullam suscipit iaculis commodo urna.
			</blockquote>

			<p>This is regular paragraph text. Augue pulvinar faucibus duis vulputate penatibus nullam suscipit iaculis commodo urna. Erat curae; placerat nunc vehicula. Himenaeos adipiscing ultrices elit suscipit, mattis praesent lobortis. Mi ligula molestie vel et lobortis elementum lectus tellus tempus enim. Vulputate quisque ante ridiculus etiam ultrices enim, litora dignissim elit volutpat quis class? Quam dictum rutrum netus.</p>
			<p>This is regular paragraph text. Augue pulvinar faucibus duis vulputate penatibus nullam suscipit iaculis commodo urna. Erat curae; placerat nunc vehicula. Himenaeos adipiscing ultrices elit suscipit, mattis praesent lobortis. Mi ligula molestie vel et lobortis elementum lectus tellus tempus enim. Vulputate quisque ante ridiculus etiam ultrices enim, litora dignissim elit volutpat quis class? Quam dictum rutrum netus.</p>
		</div>
    </section>

    <section class="inside-supporting">
		<aside class="aside">
			<h1 class="aside-title">Hello <?php echo $first_name.' '.$last_name; ?>!</h1>
			<section class="aside-content">
				 <img src="<?php echo $profile_image_link; ?>">
				 <p>Your Email: <?php echo $email; ?></p>
				 <p><a href="/mycat/logout.php" class="btn">Logout</a></p>
			</section>
		</aside>

		<aside class="aside">
			<h1 class="aside-title">Titulo de un aside</h1>
			<section class="aside-content">
				Lacus curae; neque sit pellentesque scelerisque laoreet accumsan suspendisse vehicula bibendum per. Maecenas class enim vitae. Dictumst; ornare posuere eleifend luctus accumsan consequat quam dui sit ullamcorper. Ut per cubilia, parturient vehicula bibendum elit quisque porta vel. Augue sem venenatis praesent dictum leo condimentum eu eleifend cursus. Volutpat iaculis diam est iaculis magna odio facilisi, eget facilisi fermentum mauris porttitor! Maecenas nullam euismod metus sed purus? Elementum enim, fringilla nunc.
			</section>
		</aside>

    </section>
</main>

<?php }
// #########################################
// SHOW LOGGED OUT
// #########################################
	else { // If is not logged in
?>

<main class="inside">
    <section class="inside-content">
	        <h1 class="page-title">Welcome to MyCAT</h1>
		<div class="content">
			<p>This is page is restricted to CAT Faculty and Personnel. To continue inside, you will have to provide your CAT credentials to access the information.</p>
			<p><a href="<?php echo $login_url; ?>" class="btn btn-alt btn-big">Login with Google</a></p>
		</div>
    </section>
</main>
<?php }
	// #########################################
	// BEGIN FOOTER
	// #########################################
	include "../_elements/footer.php";

?>