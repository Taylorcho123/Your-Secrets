<!DOCTYPE HTML>

<html lang=ko>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="/img/favicon-16.png" sizes="16x16">
<link rel="icon" href="/img/favicon-24.png" sizes="16x16"> 
<link rel="icon" href="/img/favicon-32.png" sizes="32x32"> 
<link rel="icon" href="/img/favicon-64.png" sizes="64x64">
<link rel="icon" href="/img/favicon-128.png" sizes="128x128">

<?php
include "GibberishAES.php";
?>

	<head>
		<meta charset=utf-8>
		<title>Your Secrets :: Encrypt</title>
	</head>

	<style type="text/css">
	    @import url("css/style.css");
	</style>
	
	<body>
		<div id="container">
			<span>
				<div class='in'>
					<?php

					$conn = mysqli_connect('localhost', '****', '*****','*****');
					if($conn === false) {
						die("ERROR: Could not connect. " . mysqli_connect_error());
					}
		
					if(isset($_POST['submit'])) {
						$id = mt_rand(10000, 99999);
						$ti = date("Y-m-d H:i:s");
						$pass_in = $_POST['k'];
						$string = $_POST['essay'];

						$check_ids = 0;
                        while($check_ids == 0) {
                            $query_ids = "SELECT COUNT(*) FROM Encs WHERE id = ".$id;
                            $result_ids = mysqli_query($conn, $query_ids);
                            if($ids_count = mysqli_fetch_row($result_ids)) {
                                if($ids_count[0] == 0) {
                                    $check_ids = 1;
                                }
                                else {
                                    $id = mt_rand(10000, 99999);
                                }
                            }
                        }

                        if(strlen($pass_in) < 6) {
							echo "The password should be a minimum of six characters in length.";
						} 
					   else {
							$pass_stored = base64_encode(hash('sha512', ($pass_in . $ti), true));

							GibberishAES::size(256);
							$encrypted_string = GibberishAES::enc($string, $pass_stored);

							$query = "INSERT INTO Encs(id, ti, k, essay) VALUES ('$id', '$ti', '$pass_stored','$encrypted_string')";
							$result = mysqli_query($conn, $query);
					
							if($result) {
								echo "<h2>Successfully Encrypted.</h2>";
								echo "<h2>Your Encrypted Post's ID is : </h2>";
								echo "<div class='number'>";
								echo $id;
								echo "</div>";
							}
							else {
    							echo "<h2>Failed To Request the Query.</h2>";
                                echo "<br>";
                                echo "<p> Please E-mail to the admin : taylorenjeacho@gmail.com</p>";
							}
						}
					}
					mysqli_close($conn);
					?>
				</div>
				<br><br>
				<input class="button" onclick="location.href='/upload.php'" type="button" value="back" />
				<br>
				<input class="button" onclick="location.href='/'" type="button" value="main" />		
				<br><br>		
			</span>
		</div>
	</body>
</html>