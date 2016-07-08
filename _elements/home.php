        <main>
            <section class="news" itemscope itemtype="http://schema.org/NewsArticle">
                <article class="news-content">
					<?php include "get-article.php"; ?>
                </article>
            </section>
            <section class="events">
                <div class="events-header">
                    <h1>Next Events</h1>
                </div>
                <article class="event evt-hs" itemscope itemtype="http://schema.org/Event">
                    <h3 class="event-date" itemprop="startDate" content="2016-06-21T20:00">21<br><span>Jun</span></h3>
                    <div class="event-info">
                        <p class="event-title" itemprop="name">Graduation Ceremony<br><span>High School</span></p>
                        <p class="event-place" itemprop="description">CVPA Auditorium</p>
                    </div>
                    <p class="event-hour">20:00 hrs.</p>
                </article>
                <article class="event evt-all" itemscope itemtype="http://schema.org/Event">
                    <h3 class="event-date" itemprop="startDate" content="2016-08-12T07:45">12<br><span>Aug</span></h3>
                    <div class="event-info">
                        <p class="event-title" itemprop="name">Back To School<br><span>Elementary - High School</span></p>
                    </div>
                    <p class="event-hour">07:45 hrs.</p>
                </article>
                <article class="event evt-ech" itemscope itemtype="http://schema.org/Event">
                    <h3 class="event-date" itemprop="startDate" content="2016-08-15T08:00">15<br><span>Aug</span></h3>
                    <div class="event-info">
                        <p class="event-title" itemprop="name">Back To School<br><span>Early Childhood</span></p>
                    </div>
                    <p class="event-hour">08:00 hrs.</p>
                </article>
                <article class="event evt-ech" itemscope itemtype="http://schema.org/Event">
                    <h3 class="event-date" itemprop="startDate" content="2016-08-15T08:00">29<br><span>Aug</span></h3>
                    <div class="event-info">
                        <p class="event-title" itemprop="name">Back To School<br><span>Early Childhood</span></p>
                        <p class="event-place" itemprop="description">CVPA Auditorium</p>
                    </div>
                    <p class="event-hour">08:00 hrs.</p>
                </article>
                <a href="#" class="events-more">
                    <div>
                        <h1>See All Events</h1>
                        <i class="icon-chevron-double"></i>
                    </div>
                </a>
            </section>
        </main>