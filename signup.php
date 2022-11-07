<?php
	include "db_connection.php"; //DataBase connection info
	
	//user data
	$username = (isset($_POST['uname']) ? $_POST['uname'] : null);
	$first_name = (isset($_POST['fname']) ? $_POST['fname'] : null);
	$last_name = (isset($_POST['lname']) ? $_POST['lname'] : null);
	$password = (isset($_POST['psw']) ? $_POST['psw'] : null);
	//against sql injection
	$username = stripslashes($username);
	$first_name = stripslashes($first_name);
	$last_name = stripslashes($last_name);
	$password = stripslashes($password);

	if (isset($_POST['signup_button']))
	{
		//insert new user to DataBase
		$signup_query = "INSERT INTO `users` (`username`, `first_name`, `last_name`, `password`) VALUES ('$username', '$first_name', '$last_name', '$password');";
		$signup_query_result = mysqli_query($conn, $signup_query);
		
		if($signup_query_result) 
		{
			session_start();
			$_SESSION['signup_msg'] = 1; //used for messaging the user
			$_SESSION['signup_name'] = $first_name;
			
			header("location:index.php");
		} 
		else 
		{
			echo "ERROR";
		}
	}
	mysqli_close($conn);

?>