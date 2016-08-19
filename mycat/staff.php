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
			<p class="page-hero">Welcome to the CAT Teachers' Portal with everything you could possibly need.</p>
			<h2>Calendars</h2>
			<p>
				<span class="cal-swatch" style="background:#2952A3">&nbsp;&nbsp;&nbsp;&nbsp;</span> Facilities &nbsp;&nbsp;&nbsp;
				<span class="cal-swatch" style="background:#711616">&nbsp;&nbsp;&nbsp;&nbsp;</span> Laptop &nbsp;&nbsp;&nbsp;
				<span class="cal-swatch" style="background:#B1440E">&nbsp;&nbsp;&nbsp;&nbsp;</span> iPads &nbsp;&nbsp;&nbsp;
				<span class="cal-swatch" style="background:#0F4B38">&nbsp;&nbsp;&nbsp;&nbsp;</span> Projector &nbsp;&nbsp;&nbsp;
				<span class="cal-swatch" style="background:#528800">&nbsp;&nbsp;&nbsp;&nbsp;</span> Room 54 &nbsp;&nbsp;&nbsp;
			</p>
			<iframe src="https://calendar.google.com/calendar/embed?title=CAT%20Events&amp;showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=cat.mx_53ffcqgmisee7235qgof100ue8%40group.calendar.google.com&amp;color=%232952A3&amp;src=cat.mx_0k30e4vnurau53tunkoofgfg0o%40group.calendar.google.com&amp;color=%23711616&amp;src=cat.mx_07re1ol9pm61eavu18qsl0n0hk%40group.calendar.google.com&amp;color=%23B1440E&amp;src=cat.mx_uaipuhtbova20co179nnc54lj4%40group.calendar.google.com&amp;color=%230F4B38&amp;src=cat.mx_kia5241n372cq1vl0jn0fjnnf0%40group.calendar.google.com&amp;color=%23528800&amp;ctz=America%2FMexico_City" style="border-width:0" width="90%" height="500" frameborder="0" scrolling="no" class="cal"></iframe>
			<div class="portal-container">

			</div>
		</div>
    </section>

    <section class="inside-supporting">
		<aside class="aside">
			<h1 class="aside-title">Hello <?php echo $first_name.' '.$last_name; ?>!<img src="<?php echo $profile_image_link; ?>" class="aside-profile-img"></h1>
			<section class="aside-content">
				 <p class="align-right portal-logout"><a href="/mycat/logout.php" class="btn btn-small">Logout</a></p>
				 <p>Your Email: <?php echo $email; ?></p>
				 <br />
				 <p>
					 <span class="portal-icon"><a href="http://plusportals.com/cat" data-title="Teacher's Plus"><img src="/img/portal/teachersplus.png"></a></span>
					 <span class="portal-icon"><a href="http://mail.google.com" data-title="Gmail"><img src="/img/portal/email.png"></a></span>
					 <span class="portal-icon"><a href="http://drive.google.com" data-title="Gmail"><img src="/img/portal/drive.png"></a></span>
					 <span class="portal-icon"><a href="http://docs.google.com" data-title="Google Docs"><img src="/img/portal/docs.png"></a></span>
					 <span class="portal-icon"><a href="http://slides.google.com" data-title="Google Slides"><img src="/img/portal/slides.png"></a></span>
					 <span class="portal-icon"><a href="http://sheets.google.com" data-title="Google Sheets"><img src="/img/portal/sheets.png"></a></span>
				 </p>
			</section>
		</aside>

		<aside class="aside">
			<h1 class="aside-title">Quick Documents</h1>
			<section class="aside-content">
				<ul>
					<li><a href="http://www.cat.mx/handbooks/TEACHER_HANDBOOK_16-17.pdf">Teacher Handbook (2016-2017)</a></li>
					<li><a href="http://www.cat.mx/Community-Teachers-Professional%20Development.pdf">Professional Development Policies</a></li>
					<li><a href="http://www.cat.mx/Formato_para_verificacion_de_creditos.pdf">PD Credit Verification Format</a></li>
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