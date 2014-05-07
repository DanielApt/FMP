<?php require 'templates/header.php';?>

	<div class="intro row">
		<div class="jumbotron text-center">
			<p class="lead">Test my time perception.</p>
			<button type="button" class="btn btn-default btn-lg show-test">Show Test</button>
		</div>
	</div>
	<div class="test row">
		<div class="jumbotron text-center">
			<p class="lead">Tap this window whenever you think 20 seconds has past.</p>
			<p>Still <span class="remaining-taps">6</span> remaining.</p>
			<button type="button" class="btn btn-default btn-lg start-test">Start</button>
			<button type="button" class="btn btn-primary btn-lg tap" disabled>Tap!</button>
		</div>
	</div>
	<div class="thank-you row">
		<div class="jumbotron text-center">
			<p class="lead">Thank you for helping us out!</p>
		</div>
	</div>

<?php require 'templates/footer.php';?>