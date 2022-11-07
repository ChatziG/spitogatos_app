<?php
	header("Refresh:0; url=index.php"); //refresh user page
	$seconds = -10 + time(); //make cookie expire
	setcookie("loggedin", date("F jS - g:i a"), $seconds);

	session_destroy();
?>