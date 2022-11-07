<?php
	include "db_connection.php"; //DataBase connection info
	session_start();
	
	//user inputs
	$username = $_SESSION['admin_username'];
	$new_price = (isset($_POST['new_price']) ? $_POST['new_price'] : null);
	$new_location = (isset($_POST['new_location']) ? $_POST['new_location'] : null);
	$new_availability = (isset($_POST['new_availability']) ? $_POST['new_availability'] : null);
	$new_area = (isset($_POST['new_area']) ? $_POST['new_area'] : null);
	
	if (isset($_POST['add_estate_button']) and $new_price!=NULL and $new_area!=NULL)
	{
		//add new estate query
		$add_query = "INSERT INTO `estates` (`userName`, `location`, `price`, `availability`, `area`) VALUES ('$username', '$new_location', $new_price, '$new_availability', $new_area);";
		$add_query_result = mysqli_query($conn, $add_query);

		if($add_query_result) 
		{
			//echo "<br/><br/><span>added successfully...!!</span>";
			mysqli_close($conn);
			header("Refresh:0; url=admin_page.php");
		} 
		else 
		{
			echo "ERROR";
		}
	}
	
?>