<?php
	$pagetitle = "Facilities";
	$specialhead = '
	<script src="https://www.gstatic.com/swiffy/v6.0/runtime.js"></script>
	<script src="/js/interactivemap.js"></script>';
	include "../_elements/header.php"; ?>

<main class="inside">
    <section class="inside-content">
        <h1 class="page-title">Facilities</h1>
		<div id="swiffycontainer" style="width: 1000px; height: 600px"></div>
		<div class="content">
			<p>The American School of Torreon counts with sports facilities like soccer field, track, baseball field, 2 gymnasiums, a solar heated swimming pool and tennis, basketball and volleyball courts.</p>
			<p>In the academic area we count with 6 computer labs (one of them a Mac LAB), 8 portable iPad labs, 7 science labs, two media centers with over 20,000 library materials, 3 music classrooms and a center art.</p>
			<p>For the care of the students the school counts with an infirmary, cafeteria and 2 counseling office.</p>
		</div>
		<script>var stage = new swiffy.Stage(document.getElementById('swiffycontainer'),swiffyobject);stage.start();</script>
    </section>
</main>
<?php
	include "../_elements/footer.php";

?>