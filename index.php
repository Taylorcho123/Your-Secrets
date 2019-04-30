<!DOCTYPE html>

<html lang=ko>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="/img/favicon-16.png" sizes="16x16">
<link rel="icon" href="/img/favicon-24.png" sizes="16x16"> 
<link rel="icon" href="/img/favicon-32.png" sizes="32x32"> 
<link rel="icon" href="/img/favicon-64.png" sizes="64x64">
<link rel="icon" href="/img/favicon-128.png" sizes="128x128">

	<head>
		<meta charset=utf-8>
		<title>:: Your Secrets ::</title>
	</head>

	<style type="text/css">
	    @import url("css/style.css");
	</style>

	<body>
		<div id="container">
			<span>
				<div class="header">
					<h1>Your  Secrets</h1>
				</div>

				<div class="in">
					<form action="decrypt.php" method="POST">
						<p class="input_box">Password: <input style="float: right;" type="text" name="k" /></p>
						<p class="input_box">Number: <input style="float: right;" type="text" name="id" /></p>
						<br>
						<input class="button_simple" name="submit" type="submit" value="Decrypt" />
						<br><br>
					</form>
				</div>
				<br><br>
				<input class="button" style="color:red;" onclick="location.href='notice.html'" type="button" value="Notice!" />
				<br>
				<input class="button" onclick="location.href='tip.html'" type="button" value="Tips" />
				<br>
				<input class="button" onclick="location.href='upload.php'" type="button" value="Upload" />
				<br>
				<input class="button" onclick="location.href='see_ex.php'" type="button" value="Encryptions" />
				<br><br>				

	</body>
</html>

