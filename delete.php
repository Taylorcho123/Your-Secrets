<!DOCTYPE html>

<html lang=ko>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="/img/favicon-16.png" sizes="16x16">
<link rel="icon" href="/img/favicon-24.png" sizes="16x16"> 
<link rel="icon" href="/img/favicon-32.png" sizes="32x32"> 
<link rel="icon" href="/img/favicon-64.png" sizes="64x64">
<link rel="icon" href="/img/favicon-128.png" sizes="128x128">
<meta charset=utf-8>

	<head>
		<meta charset=utf-8>
		<title>Your Secrets :: Delete</title>
	</head>

	<style type="text/css">
	    @import url("css/style.css");
	</style>

	<body>
		<div id="container">
			<span>
				<br><br>
				<div class="in">
					<form action="delete_done.php" method="POST">
						<p class="input_box">Password: <input style="float: right;" type="text" name="k" /></p>
						<p class="input_box">Number: <input style="float: right;" type="text" name="id" /></p>
						<br>
						<div>
							<h3>Are you sure you want to delete this post?</h3>
							<input class="button_simple" style="color:red;" name="submit_delete" type="submit" value="Yes" />
							<input class="button_simple" onclick="location.href='/'" type="button" value="No" />
						</div>
						<br>
					</form>
				</div>
				<br><br>
	</body>
</html>

