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
		<title>Your Secrets :: See Encryptions</title>
	</head>

	<style type="text/css">
	    @import url("css/style.css");
	</style>

	<body>
		<div id="container">
			<span>
				<div class="header_small">
					<h1>See Encryption Examples</h1>
					<p style="font-family: '1952_Rheinmetall'; font-size: 20px;">You can see top 30 of the lastest encrypted post.</p>
				</div>

				<input class="button" onclick="location.href='/'" type="button" value="main" />
				<br><br>

				<?php
	 			$conn = mysqli_connect('localhost', '****', '*****','*****');
	 			$sql = "SELECT essay FROM Encs ORDER BY ti DESC LIMIT 30";
	 			$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_row($result)) {
					echo '<div class="in_see_all">';
	 				echo '<p>'.$row[0].'</p>';
					echo '</div>';
					echo '<br><br>';
	 			}
	 			?>
				<br><br>				

	</body>
</html>

