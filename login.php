<?php
include "db_connection.php"; //DataBase connection info

//user data
$username = (isset($_POST['uname']) ? $_POST['uname'] : null);
$password = (isset($_POST['psw']) ? $_POST['psw'] : null);
//against sql injection
$username = stripslashes($username);
$password = stripslashes($password);


if (isset($_POST['login_button']))
{
	//query DataBase for username and password
	$user_query = "SELECT * FROM users WHERE username='$username' and password='$password'";
	$user_query_result = mysqli_query($conn, $user_query);

	//check if SQL returns any result
	if (mysqli_num_rows($user_query_result) > 0) {
		// output data of each row
		$user_row = mysqli_fetch_assoc($user_query_result);
		$name = $user_row["username"];
		$pass = $user_row["password"];
		$first_name = $user_row["first_name"];

		session_start();
		$_SESSION['admin']=$first_name;
		$_SESSION['admin_username']=$username;
		//check if username and password are correct
		if($password == $pass && $username==$name)
		{
			$seconds = 3600 + time();
			setcookie("loggedin", date("F jS - g:i a"), $seconds);
			header("location:admin_page.php");
		}
		else
		{
			echo "wrong username or password";
			session_destroy();
		} 
	} 
	else
	{
		session_start();
		$_SESSION['error_login'] = 1;
		header("location:index.php");
	}
}
mysqli_close($conn);
?>