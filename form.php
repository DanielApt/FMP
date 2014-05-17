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
	$attempt1 = intval(mysql_real_escape_string($_POST['attempt-1'])) - intval(mysql_real_escape_string($_POST['starting-time']));
	$attempt2 = intval(mysql_real_escape_string($_POST['attempt-2'])) - intval(mysql_real_escape_string($_POST['attempt-1']));
	$attempt3 = intval(mysql_real_escape_string($_POST['attempt-3'])) - intval(mysql_real_escape_string($_POST['attempt-2']));
	$attempt4 = intval(mysql_real_escape_string($_POST['attempt-4'])) - intval(mysql_real_escape_string($_POST['attempt-3']));
	$attempt5 = intval(mysql_real_escape_string($_POST['attempt-5'])) - intval(mysql_real_escape_string($_POST['attempt-4']));
	$attempt6 = intval(mysql_real_escape_string($_POST['attempt-6'])) - intval(mysql_real_escape_string($_POST['attempt-5']));

	die($attempt3);

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
	</div>
HERE;
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