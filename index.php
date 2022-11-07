<?php session_start();?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>

		<div class="header">
			<img src="spitogatos_icon.png" alt="Spitogatos" alt="logo" />
			<h1>Σύστημα διαχείρισης αγγελιών</h1>
		</div>

<!-----Log In--------------------------------------------------------------------------------------------------------------------------------------->
		<button onclick="document.getElementById('id01').style.display='block'">Σύνδεση</button>

		<div id="id01" class="modal">
		  <form class="modal-content animate" action="login.php" method="post">
			<div class="imgcontainer">
			  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
			  <img src="spitogatos_logo_2.png" alt="Spitogatos" class="avatar" style="width:40%;">
			</div>

			<div class="container">
			  <label for="uname"><b>Username</b></label>
			  <input type="text" placeholder="Εισάγετε Username" name="uname" required>

			  <label for="psw"><b>Κωδικός</b></label>
			  <input type="password" placeholder="Εισάγετε Κωδικό" name="psw" required>
				
			  <button type="submit" name="login_button">Σύνδεση</button>
			</div>

			<div class="container" style="background-color:#f1f1f1; border-radius: 0px 0px 25px 25px;">
			  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Ακύρωση</button>
			  <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
			</div>
		  </form>
		</div>

		<script>
			// Get the modal
			var modal = document.getElementById('id01');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
		</script>
<!-----Sign-up--------------------------------------------------------------------------------------------------------------------------------------->                        
		<br>
		<button onclick="document.getElementById('id02').style.display='block'">Εγγραφή</button>

		<div id="id02" class="modal">
		  <form class="modal-content animate" action="signup.php" method="post">
			<div class="imgcontainer">
			  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
			  <img src="spitogatos_logo_2.png" alt="Spitogatos" class="avatar" style="width:40%;">
			</div>

			<div class="container">
			  <label for="fname"><b>Όνομα</b></label>
			  <input type="text" placeholder="Εισάγετε Όνομα" name="fname" required>
			  
			  <label for="lname"><b>Επώνυμο</b></label>
			  <input type="text" placeholder="Εισάγετε Επώνυμο" name="lname" required>
			  
			  <label for="uname"><b>Username</b></label>
			  <input type="text" placeholder="Εισάγετε Username" name="uname" required>

			  <label for="psw"><b>Κωδικός</b></label>
			  <input type="password" placeholder="Εισάγετε Κωδικό" name="psw" required>
				
			  <button type="submit" name="signup_button">Εγγραφή</button>
			</div>

			<div class="container" style="background-color:#f1f1f1; border-radius: 0px 0px 25px 25px;">
			  <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Ακύρωση</button>
			</div>
		  </form>
		</div>

		<script>
			// Get the modal
			var modal = document.getElementById('id02');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
		</script>
		<p style='color:#04bf33; font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold;'>
			<?php
				$signup_ok = $_SESSION['signup_msg'] ?? NULL;
				$signup_name = $_SESSION['signup_name'] ?? NULL;
				if($signup_ok == 1)
				{
					echo "Συγχαρητήρια <span style='color:#254f6b'>$signup_name</span>! Η εγγραφή σας ολοκληρώθηκε! Μπορείτε να συνδεθείτε!";
					$signup_ok = 0;
					session_destroy();
				}
			?>
		</p>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
		<p style='color:red; font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold;'>
			<?php
				$login_error = $_SESSION['error_login'] ?? NULL;
				if($login_error == 1)
				{
					echo "ΣΦΑΛΜΑ: Λάθος username ή password: &nbsp;&nbsp;&nbsp;";
					echo "<button onclick=window.location.assign('index.php') style='width:auto;'>Προσπαθήστε ξανά</button>";
					$login_error = 0;
					session_destroy();
				}
			?>
		</p>
	</body>
</html>