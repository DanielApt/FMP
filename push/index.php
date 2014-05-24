<!doctype html>
<html>
<head>
	<title>Let's hope we get that data</title>
	<script type="text/javascript">
	var source=new EventSource("pusher.php"); //server.php is the name of the server page
	source.onmessage=function(event)
	 {
	 document.getElementById("result").innerHTML+=event.data + "<br>";
	 };
 </script>
</head>

<body>
	<h1>Hello World</h1>
	<p id="result"><p>
</body>
</html>