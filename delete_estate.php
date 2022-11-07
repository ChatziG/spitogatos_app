<?php
	include "db_connection.php"; //DataBase connection info
	session_start();

	if(isset($_GET['did'])) 
	{
		//delete etate form DataBase query
		$delete_id = mysqli_real_escape_string($conn, $_GET['did']);
		$delete_query = "DELETE FROM estates WHERE estate_id = '".$delete_id."'";
		$delete_query_result = mysqli_query($conn, $delete_query);

		if($delete_query_result) 
		{
			echo "<br/><br/><span>deleted successfully...!!</span>";
			mysqli_close($conn);
			header("Refresh:0; url=admin_page.php");
		} 
		else 
		{
			echo "ERROR deleting";
		}
	}

?>
