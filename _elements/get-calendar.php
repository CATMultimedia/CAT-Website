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
$client->setDeveloperKey('AIzaSyAw76SCTSMDn3wpXC3sH6dB_i-i2SA7HR8'); //GET AT AT DEVELOPERS.GOOGLE.COM
$cal = new Google_Service_Calendar($client);
//THE CALENDAR ID, FOUND IN CALENDAR SETTINGS. IF YOUR CALENDAR IS THROUGH GOOGLE APPS
//YOU MAY NEED TO CHANGE THE CENTRAL SHARING SETTINGS. THE CALENDAR FOR THIS SCRIPT
//MUST HAVE ALL EVENTS VIEWABLE IN SHARING SETTINGS.
$calendarId = 'a627k5cp2er1hi50lejistc1kc@group.calendar.google.com';
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
//echo '<pre>';
//print_r($events);
//echo '</pre>';


 //START THE LOOP TO LIST EVENTS
     foreach ($events->getItems() as $event) {

        //Convert date to month and day
         $eventDateStr = $event->start->dateTime;
         if(empty($eventDateStr))
         {
             // it's an all day event
             $eventDateStr = $event->start->date;
         }

         $temp_timezone = $event->start->timeZone;
 //THIS OVERRIDES THE CALENDAR TIMEZONE IF THE EVENT HAS A SPECIAL TZ
         if (!empty($temp_timezone)) {
         $timezone = new DateTimeZone($temp_timezone); //GET THE TIME ZONE
                 //Set your default timezone in case your events don't have one
     } else { $timezone = new DateTimeZone($calTimeZone);
         }

         $eventdate = new DateTime($eventDateStr,$timezone);
 		 $link = $event->htmlLink;
                 $TZlink = $link . "&ctz=" . $calTimeZone; //ADD TZ TO EVENT LINK
				 							//PREVENTS GOOGLE FROM DISPLAYING EVERYTHING IN GMT
         $newmonth = $eventdate->format("M");//CONVERT REGULAR EVENT DATE TO LEGIBLE MONTH
         $newday = $eventdate->format("d");//CONVERT REGULAR EVENT DATE TO LEGIBLE DAY
         $newtime = $eventdate->format("H:i"); //CONVERT REGULAR EVENT TIME TO MILITARY TIME
         $title = substr($event->summary,4);
         $class = strtolower(substr($event->summary,0,2));
         $location = $event->location;
         if ($newtime=="00:00") {
	         $newtime = "All day";
         } else { $newtime = $newtime . ' hrs.';}

        ?>
            <article class="event evt-<?php echo $class;?>" itemscope itemtype="http://schema.org/Event">
		        <h3 class="event-date" itemprop="startDate" content="<?php echo $event->start->dateTime; ?>"><?php echo $newday; ?><br><span><?php echo $newmonth; ?></span></h3>
		        <div class="event-info">
		            <p class="event-title" itemprop="name"><?php echo $title; ?>
					<br><span>
					<?php
						if($class=="ec") { echo "Early Childhood";} elseif($class=="es"){ echo "Elementary";} elseif($class=="hs") {echo "High School";} else {echo "CAT Community";} ?>
					</span></p>
					<?php
						if(!$location) { ?>
							<p class="event-place" itemprop="description">CVPA Auditorium</p>
						<?php } ?>
		        </div>
		        <p class="event-hour"><?PHP echo $newtime; ?></p>
			</article>
<?php } ?>