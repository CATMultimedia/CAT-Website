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
                	<?php include "get-calendars.php"; ?>
                <a href="#" class="events-more">
                    <div>
                        <h1>See All Events</h1>
                        <i class="icon-chevron-double"></i>
                    </div>
                </a>
            </section>
        </main>