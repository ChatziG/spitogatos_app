<?php
	include "db_connection.php"; //DataBase connection info

	session_start();
	$firstname = $_SESSION['admin'];
	$username = $_SESSION['admin_username'];

	//user estates list query
	$estates_query = "SELECT estate_id, location, availability, price, area FROM users JOIN estates ON users.username = estates.userName AND users.username = '$username'";
	$estates_query_result = mysqli_query($conn, $estates_query);
?>

<!doctype html>
<html>
	<div class='header'>
	  <img src='spitogatos_icon.png' alt='Spitogatos' alt='logo' />
	  <h1>Σύστημα διαχείρισης αγγελιών (καλώς ήλθες <span style='color:#254f6b'><?php echo $firstname?></span>)</h1>
	</div>
	<link type='text/css' rel='stylesheet' href='style.css'>
	<table id='estates'>
		<tr>
			<th>Προσθήκη ακινήτου</th>
			<th>Λίστα αγγελιών</th>
		</tr>
		<tr>
			<td style='max-width:250px;'>
				<form action='add_estate.php' method='POST'>  
					<label for='new_price'>Τιμή (€):</label>
					<input type='number' min='50' max='5000000' placeholder='50 ~ 5000000' style='width:72%;' id='new_price' name='new_price' required>
					<br><br>
					<label for='new_location'>Περιοχή:</label>
					<select style='width:73.5%;' name='new_location' id='new_location'>
						<option value='Αθήνα'>Αθήνα</option>
						<option value='Θεσσαλονίκη'>Θεσσαλονίκη</option>
						<option value='Πάτρα'>Πάτρα</option>
						<option value='Ηράκλειο'>Ηράκλειο</option>
					</select>
					<br><br>
					<label for='new_availability'>Διαθεσιμότητα:</label>
						<select style='width:60%;' name='new_availability' id='new_availability'>
							<option value='ενοικίαση'>ενοικίαση</option>
							<option value='πώληση'>πώληση</option>
						</select>
						<br><br>
						<label for='new_area'>Τετραγωνικά (τ.μ.):</label>
						<input type='number' min='20' max='1000' placeholder='20 ~ 1000' style='width:50%;' id='new_area' name='new_area' required>
						<br><br>
						<input class='center-block' type='submit' name='add_estate_button' value='Προσθήκη'>
				</form>
			</td>
			<td>	
				<?php	
					while($row_estate = mysqli_fetch_assoc($estates_query_result)) 
					{
						$location = $row_estate["location"];
						$availability = $row_estate["availability"];
						$price = $row_estate["price"];
						$area = $row_estate["area"];
						//echo estate info and delete option
						echo "&nbsp;&nbsp;$location, $availability, $price ευρώ, $area τ.μ.";
						echo "&nbsp;&nbsp;";
						echo "<a href='delete_estate.php?did=".$row_estate['estate_id']."'>Διαγραφή</a>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<br><br>";
					}
				?>				
			</td>
		</tr>
		<tr>
			<td colspan='2' style='text-align:center; color:grey;'>All rights reserved</td>
		</tr>
	</table>			
	
	<form action="logout.php" method="post">
		<button type="submit"  style="width:20.8%;">Logout</button>
	</form>
	
	<?php mysqli_close($conn); ?>
</html>