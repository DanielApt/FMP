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
	<div class="after-submit row">
		<div class="jumbotron text-center">
			<p class="lead">Thank you for helping us out!</p>
		</div>
	</div>

	<form class="hidden">
		<input type="hidden" id="starting-time" name="starting-time">
		<input type="hidden" id="attempt-1" name="attempt-1"/>
		<input type="hidden" id="attempt-2" name="attempt-2"/>
		<input type="hidden" id="attempt-3" name="attempt-3"/>
		<input type="hidden" id="attempt-4" name="attempt-4"/>
		<input type="hidden" id="attempt-5" name="attempt-5"/>
		<input type="hidden" id="attempt-6" name="attempt-6"/>
	</form>

<?php require 'templates/footer.php';?>