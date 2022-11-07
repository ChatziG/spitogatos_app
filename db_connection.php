<?php
	//DataBase connection info
	$dbservername = "127.0.0.1:3308";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "spitogatos_db";
	
	//Create connection
	$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
	//Check connection
	if (!$conn) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
?>