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
		<title>Your Secrets :: Write</title>
	</head>

	<style type="text/css">
	    @import url("css/style.css");
	</style>

	<script language="javascript">
		function countingWords(){
			document.getElementById("sp01").innerHTML = document.getElementById("userTxt").value.length;
		}
	</script>

	<body>
		<div id="container">
			<span>
				<div class="header_small">
					<h1>Upload your Secrets</h1>
				</div>

				<div class="in_upload">
					<form action="encrypt.php" method="POST">
						<p class="input_box">Password: <input style="float: right;" type="text" name="k" /></p>
						<textarea name="essay" id="userTxt" onkeyup="countingWords()" maxlength="1000"></textarea>
						<br><br>
						<div class="counter">
							<span id="sp01">0</span><span style="text-align: left;">/1000</span>
						</div>
						<br>
						<input class="button_simple" name="submit" type="submit" value="Upload" />
						<br><br>
					</form>
				</div>
				<br><br>

				<input class="button" onclick="location.href='/'" type="button" value="main" />
				<br><br>					

	</body>
</html>

