<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Colegio Americano de Torreón <?php if (!empty($pagetitle)) { ?> - <?php echo $page-title; ?><?php } else { echo " - excellence for life";} ?></title>
        <link rel="stylesheet" href="/css/base.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300" rel="stylesheet" type="text/css">
		<script async type="text/javascript">
		  WebFontConfig={google:{ families:['Ubuntu:300,400,400italic,500,500italic,700,700italic:latin' ]}};(function() {var wf = document.createElement('script');wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';wf.type = 'text/javascript';wf.async = 'true';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(wf, s);})();
		  </script>

    </head>

    <body <?php if (!empty($pagetitle)) { ?> class="not-home" <?php } ?>>
        <img src="/img/Menu.svg" id="hamburgerButton">
        <header class="topHeader">
            <div class="logo">
                <a href="/"><img class="catLogo" alt="Colegio Americano de Torreón" src="/img/logo.png"></a>
                <a href="/"><img src="/img/logo-name.svg" class="catName"></a>
            </div>


            <nav class="nav-wrapper">
                <nav class="nav-resources">
                    <ul>
                        <li><a href="#"><span class="resourceImg icon-students"></span><br>Students</a></li>
                        <li><a href="#"><span class="resourceImg icon-parents"></span><br>Parents</a></li>
                        <li><a href="#"><span class="resourceImg icon-faculty"></span><br>Faculty</a></li>
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
                        <li><a class="mainLink ql">Gradebook</a></li>
                        <li><a class="mainLink ql">Calendar</a></li>
                        <li><a class="mainLink ql">Cathub</a></li>
                        <li><a class="mainLink ql">Directory</a></li>
                    </ul>
<!--                    HIDDEN FOR DESKTOP END-->

                    <h2><span class="icon-menu"> </span>Menu</h2>

                    <ul class="mainList">
                        <li class="mainLink">About CAT
                            <ul class="innerMenu" id="about">
                                <li><a href="/about/directors-message.php">Director's Message</a></li>
                                <li><a href="#">School Philosophy</a></li>
                                <li><a href="#">Facilities</a></li>
                                <li><a href="#">School Profile</a></li>
                            </ul>
                        </li>

                        <li class="mainLink">Academics
                            <ul class="innerMenu" id="academics">
                                <li><a href="#">Early Childhood</a></li>
                                <li><a href="#">Elementary</a></li>
                                <li><a href="#">Intensive English</a></li>
                                <li><a href="#">High School</a></li>
                            </ul>
                        </li>

                        <li class="mainLink" >Campus Life
                            <ul class="innerMenu" id="campusLife">
                                <li><a href="#">Library</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Art Center</a></li>
                                <li><a href="#">Counseling</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Magazines</a></li>
                                <li><a href="#">Cafeteria</a></li>
                            </ul>
                        </li>

                        <li class="mainLink">Join Us
                            <ul class="innerMenu" id="joinUs">
                                <li><a href="#">Student admissions</a></li>
                                <li><a href="#">Employment</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </nav>
        </header>