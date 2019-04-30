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
		<title>Your Secrets :: Decrypt</title>
	</head>

	<style type="text/css">
	    @import url("css/style.css");
	</style>
	
	<body>
		<div id="container">
			<span>
                <?php
				echo "<div class='in'>";
				$conn = mysqli_connect('localhost', '****', '*****','*****');
				if($conn === false) {
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
	
				if(isset($_POST['submit'])) {
					$id = $_POST['id'];
					$pass_in = $_POST['k'];
					$ti_sql = "SELECT ti FROM Encs WHERE id = ".$id;
					$ti_result = mysqli_query($conn, $ti_sql);
                    while($tis = mysqli_fetch_row($ti_result)) {
						$pass_stored = base64_encode(hash('sha512', ($pass_in . $tis[0]), true));
					}
                    
                    // Auth
                    $check_post = 0;
                    $query_post = "SELECT COUNT(*) FROM Encs WHERE k = '".$pass_stored."'";
                    $result_post = mysqli_query($conn, $query_post);
                    while($post_count = mysqli_fetch_row($result_post)) {
                        if($post_count[0] == 1) {
                            $check_post = 1;
                        }
                    }
                    
                    // Auth Failed
                    if($check_post == 0) {
                        echo "<h3>Authentication Failed.</h3>";
                        echo "<p>You may try this again.</p>";
                        echo "<hr width=80%>";
                        echo "<p>Please let me know if you encounter any problems of this site. <br>Developer E-mail : taylorenjeacho@gmail.com</p>";
                        echo "</div>";
                        echo "<br><br>";
                        echo "<input class=\"button\" onclick=\"location.href='/'\" type=\"button\" value=\"main\" />";
                        mysqli_close($conn);
                        exit(0);
                    }
					$sql_query = "SELECT essay FROM Encs WHERE k = "."'".$pass_stored."'";
					$result = mysqli_query($conn, $sql_query);

					while($enc_results = mysqli_fetch_row($result)) {
						$decrypted_string = GibberishAES::dec($enc_results[0], $pass_stored);
						echo "<p>".$decrypted_string."</p>";
					}
                }
				echo "<br><hr width=80%>";
				echo "<p>Please let me know if you encounter any problems of this site. <br>Developer E-mail : taylorenjeacho@gmail.com</p>";
                echo "</div>";
				
                mysqli_close($conn);
                ?>
                <br><br>		
                <div class="in">
                    <h3>If you want to Delete this post, click the button below : </h3>
                    <input class="button_simple" style="color:red;" onclick="location.href='delete.php'" type="button" value="Delete" />
                    <br><br>
                </div>
                <br><br>
                <input class="button" onclick="location.href='/'" type="button" value="main" />
                <br><br>
			</span>
		</div>
	</body>
</html>