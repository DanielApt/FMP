<?php
if(
	isset($_POST['starting-time']) &&
	isset($_POST['attempt-1']) &&
	isset($_POST['attempt-2']) &&
	isset($_POST['attempt-3']) &&
	isset($_POST['attempt-4']) &&
	isset($_POST['attempt-5']) &&
	isset($_POST['attempt-6'])
){
	//store our variables
	$attempt1 = intval($_POST['attempt-1']) - intval($_POST['starting-time']);
	$attempt2 = intval($_POST['attempt-2']) - intval($_POST['attempt-1']);
	$attempt3 = intval($_POST['attempt-3']) - intval($_POST['attempt-2']);
	$attempt4 = intval($_POST['attempt-4']) - intval($_POST['attempt-3']);
	$attempt5 = intval($_POST['attempt-5']) - intval($_POST['attempt-4']);
	$attempt6 = intval($_POST['attempt-6']) - intval($_POST['attempt-5']);

	//calculate the accuracy
	$accuracy = round((1 - abs(1 - ($attempt1 + $attempt2 + $attempt3 + $attempt4 + $attempt5 + $attempt6)/120000)) * 100);
	if($accuracy < 0){
		$accuracy = 0;
	}

	//let's try connecting
	include_once('db_login_details.php');

	$con = mysqli_connect($server, $user, $password, $db) or die('Failed connection: ' . mysqli_error());

	// Check connection
	if (mysqli_connect_errno()) {
		echoError();
		die();
	}

	mysqli_query($con, "INSERT INTO time_perception	VALUES(null, $attempt1, $attempt2, $attempt3, $attempt4, $attempt5, $attempt6)") or die ('Query failed : ' . mysqli_error('could not query.'));

	mysqli_close($con);

	echo <<<HERE
	<div class="jumbotron text-center jumbotron-bg-success">
		<p class="lead">Thank you for your submission!</p>
		<p>You were <strong>$accuracy%</strong> accurate!</p>

		<div class="row">
			<div class="col-sm-2 col-sm-offset-4 col-md-1 col-md-offset-5">
				<a href="https://twitter.com/share" class="twitter-share-button" data-text="Test your time perception. I was $accuracy% accurate!" data-count="none" data-hashtags="timeperception">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div>

			<div class="col-sm-2 col-md-1">
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=416857841738808&version=v2.0";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-share-button" data-href="https://iamapt.com/FMP" data-width="100" data-type="button"></div>
			</div>
		</div>
	</div>
HERE;
	die();
}else{
	echo <<<HERE
	<div class="jumbotron text-center jumbotron-bg-danger">
		<p class="lead">Do not access this page directly!</p>
	</div>
HERE;
}

function echoError(){
	echo <<<HERE
	<div class="jumbotron text-center jumbotron-bg-danger">
		<p class="lead">Uh-oh! Something has gone wrong when submitting your results.</p>
		<p>Why not <a href="">try again?</a>
	</div>
HERE;
}
?>