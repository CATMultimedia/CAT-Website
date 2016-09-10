<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="google-signin-client_id" content="628070934956-db3ugplt1u0iecgujqt2u7fd6jvoir7v.apps.googleusercontent.com">
        <title>Colegio Americano de Torreón <?php if (!empty($pagetitle)) { ?> - <?php echo $pagetitle; ?><?php } else { echo " - excellence for life";} ?></title>
        <link rel="stylesheet" href="/css/base.css" type="text/css">
		<script async type="text/javascript">
			WebFontConfig = {google:{ families:['Ubuntu:300,400,400italic,500,500italic,700,700italic:latin' ]}};(function(d) {var wf = d.createElement('script'), s = d.scripts[0];wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js';s.parentNode.insertBefore(wf, s);})(document);
		  </script>
		  <?php if (!empty($specialhead)) { echo $specialhead;} ?>
    </head>

    <body <?php if (!empty($pagetitle)) { ?> class="not-home" <?php } ?>>
       <span class="icon-menu" id="hamburgerButton"> </span>
        <header class="topHeader">
            <div class="logo" data-slides='[
					"/img/himg-1.jpg",
					"/img/himg-2.jpg",
					"/img/himg-3.jpg",
					"/img/himg-4.jpg",
					"/img/himg-5.jpg",
					"/img/himg-6.jpg",
					"/img/himg-7.jpg",
					"/img/himg-8.jpg"
			]'>
                <a href="/"><img class="catLogo" alt="Colegio Americano de Torreón" src="/img/logo.png"></a>
                <a href="/"><img src="/img/logo-name.svg" class="catName"></a>
            </div>


            <nav class="nav-wrapper">
                <nav class="nav-resources">
                    <ul>
                        <li><a href="#"><span class="resourceImg icon-students"></span><br>Students</a></li>
                        <li><a href="#"><span class="resourceImg icon-parents"></span><br>Parents</a></li>
                        <li><a href="/mycat/staff"><span class="resourceImg icon-faculty"></span><br>Faculty</a></li>
                        <li id="quicklink"><a href="#"><span class="resourceImg icon-quicklinks"></span><br>Quicklinks</a>
                        </li>
                    </ul>
                </nav>


                <nav class="nav-social">
                    <a target="_blank" href="https://www.facebook.com/ColegioAmericanoTorreon/?fref=ts"><span class="socialIcon icon-facebook"></span></a>
                    <a target="_blank" href="https://twitter.com/CATtorreon?lang=en"><span class="socialIcon icon-twitter"></span></a>
                    <a target="_blank" href="https://www.youtube.com/user/CATTorreon"><span class="socialIcon icon-youtube"></span></a>
                </nav>

                <nav class="menu">

<!--                    HIDDEN FOR DESKTOP START-->
                    <img src="/img/cancel.svg" id="closeButton" onclick="hideMenu">
                    <h2><span class="icon-quicklinks"> </span>Quicklinks</h2>

                    <ul class="quicklinks">
                        <li><a class="mainLink ql" href="http://plusportals.com/cat" target="_blank">Gradebook</a></li>
                        <li><a class="mainLink ql" href="/calendar">Calendar</a></li>
                        <li><a class="mainLink ql" href="http://cathub.org" target="_blank">Cathub</a></li>
                        <li><a class="mainLink ql" href="/directory">Directory</a></li>
                    </ul>
<!--                    HIDDEN FOR DESKTOP END-->

                    <h2><span class="icon-menu"> </span>Menu</h2>

                    <ul class="mainList">
                        <li class="mainLink">About CAT
                            <ul class="innerMenu" id="about">
                                <li><a href="/about/directors-message">Director's Message</a></li>
                                <li><a href="/about/school-philosophy">School Philosophy</a></li>
                                <li><a href="/about/history">History</a></li>
                                <li><a href="/about/facilities">Facilities</a></li>
                                <li><a href="/about/school-profile">School Profile</a></li>
                            </ul>
                        </li>

                        <li class="mainLink">Academics
                            <ul class="innerMenu" id="academics">
                                <li><a href="/academics/early-childhood">Early Childhood</a></li>
                                <li><a href="/academics/elementary">Elementary</a></li>
                                <li><a href="/academics/intensive-english">Intensive English</a></li>
                                <li><a href="/academics/high-school">High School</a></li>
                            </ul>
                        </li>

                        <li class="mainLink">Campus Life
                            <ul class="innerMenu" id="campusLife">
                                <li><a href="/campus-life/library">Library</a></li>
                                <li><a href="/campus-life/sports">Sports</a></li>
                                <li><a href="/campus-life/art-center">Art Center</a></li>
                                <li><a href="/campus-life/counseling">Counseling</a></li>
                                <li><a href="/campus-life/magazine">Magazines</a></li>
                                <li><a href="/campus-life/cafeteria">Cafeteria</a></li>
                            </ul>
                        </li>

                        <li class="mainLink">Join Us
                            <ul class="innerMenu" id="joinUs">
                                <li><a href="/join/admissions">Student admissions</a></li>
                                <li><a href="/join/employment">Employment</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </nav>
        </header>