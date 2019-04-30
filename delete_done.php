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
		<title>Your Secrets :: Delete</title>
	</head>

	<style type="text/css">
	    @import url("css/style.css");
	</style>
	
	<body>
		<div id="container">
			<span>
                <?php
				echo "<div class='in'>";
                echo "<br>";
				$conn = mysqli_connect('localhost', '****', '*****','*****');
				if($conn === false) {
					die("ERROR: Could not connect. " . mysqli_connect_error());
				}
	
				if(isset($_POST['submit_delete'])) {
					$id = $_POST['id'];
					$pass_in = $_POST['k'];

                    $ti_query = "SELECT ti FROM Encs WHERE id =".$id;
                    $ti_result = mysqli_query($conn, $ti_query);
                    $hashing_pass = 0;
                    while($ti_result = mysqli_fetch_row($ti_result)) {
                        $hashing_pass = base64_encode(hash('sha512', ($pass_in . $ti_result[0]), true));
                    }               
                    $key_query = "SELECT k FROM Encs WHERE id =".$id;
                    $key_result = mysqli_query($conn, $key_query);
                    $key_check = 0;
                    while($key_result = mysqli_fetch_row($key_result)) {
                        if($hashing_pass == $key_result[0]) {
                            echo "<h3>Successfully Authenticated.</h3>";
                            $key_check = 1;
                        }
                    }
                    if($key_check == 0) {
                        echo "<h3>Failed To Authenticate.</h3>";
                        echo "<br></div><br>";
                        echo "<input class=\"button\" onclick=\"location.href='/'\" type=\"button\" value=\"main\" />";
                        mysqli_close($conn);
                        exit(0);
                    }
                    
					$del_query = "DELETE FROM Encs WHERE id =".$id;
					$del_result = mysqli_query($conn, $del_query);
                    if($del_result) {
                        echo "<h3>Successfully Deleted!</h3>";
                    }
                    else {
                        echo "<h3>Failed To Delete.</h3>";
                    }
					
					echo "<br><hr width=80%>";
					echo "<p>Please let me know if you encounter any problems of this site. <br>Developer E-mail : taylorenjeacho@gmail.com</p>";
                    echo "</div>";
				}
                mysqli_close($conn);
                ?>
                <br><br>
				<input class="button" onclick="location.href='/'" type="button" value="main" />		
                <br><br>
			</span>
		</div>
	</body>
</html>