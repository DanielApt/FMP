<?php
if(
	isset($_POST['attempt-1']) &&
	isset($_POST['attempt-2']) &&
	isset($_POST['attempt-3']) &&
	isset($_POST['attempt-4']) &&
	isset($_POST['attempt-5']) &&
	isset($_POST['attempt-6'])
){
	//store our variables
	$attempt1 = mysql_real_escape_string($_POST['attempt-1']);
	$attempt2 = mysql_real_escape_string($_POST['attempt-2']) - mysql_real_escape_string($_POST['attempt-1']);
	$attempt3 = mysql_real_escape_string($_POST['attempt-3']) - mysql_real_escape_string($_POST['attempt-2']);
	$attempt4 = mysql_real_escape_string($_POST['attempt-4']) - mysql_real_escape_string($_POST['attempt-3']);
	$attempt5 = mysql_real_escape_string($_POST['attempt-5']) - mysql_real_escape_string($_POST['attempt-4']);
	$attempt6 = mysql_real_escape_string($_POST['attempt-6']) - mysql_real_escape_string($_POST['attempt-5']);


	//let's try connecting
	$con = mysqli_connect('localhost', 'root', 'root', 'fmp_db');

	// Check connection
	if (mysqli_connect_errno()) {
		echoError();
		die();
	}

	mysqli_query($con, "INSERT INTO time_perception	VALUES(null, $attempt1, $attempt2, $attempt3, $attempt4, $attempt5, $attempt6)") or die ('Query failed : ' . mysqli_error('could not query.'));

	mysqli_close($con);

	echo <<<HERE
	<div class="jumbotron jumbotron-bg-success">
		<p class="lead">Thank you for your submission!</p>
	</div>
HERE;
}else{
	echo <<<HERE
	<div class="jumbotron jumbotron-bg-danger">
		<p class="lead">Do not access this page directly!</p>
	</div>
HERE;
}

function echoError(){
	echo <<<HERE
	<div class="jumbotron jumbotron-bg-danger">
		<p class="lead">Uh-oh! Something has gone wrong when submitting your results.</p>
		<p>Why not <a href="">try again?</a>
	</div>
HERE;
}
?>