<?php 
$connection =  mysqli_connect("localhost","eventesi_viewer","ex2A7eywKulb","eventesi_web");
if (!$connection) {
	echo("Oops something went wrong");
	echo('<script type="text/javascript"> history.back();</script>');
	die("Connection failed:");
	}
	
$update= "UPDATE `bands` SET `name` = '".$_POST["name"]."', `description` = '".$_POST["description"]."', `calendar` = '".$_POST["calendar"]."', `videos` = '".$_POST["video"]."', `color` = '".$_POST["color"]."' WHERE `bands`.`number` = ".$_POST["number"];
mysqli_query($connection, $update);
echo('<script type="text/javascript"> history.back();</script>')
?>