<?php
if(
	isset($_POST['attempt-1']) &&
	isset($_POST['attempt-2']) &&
	isset($_POST['attempt-3']) &&
	isset($_POST['attempt-4']) &&
	isset($_POST['attempt-5']) &&
	isset($_POST['attempt-6'])
){
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
?>