<!DOCTYPE html>

<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		if ( isset($_POST['submit']) ){
			//Obtain data from form
			$email = $_POST['email'];
			$password = md5($_POST['password']);

			//Verify From Server
			
			$db= mysqli_connect("localhost", "root", "", "sold");
			$sql = "SELECT * FROM users WHERE `mail-id`='$email' AND `password`='$password'"; 
			$result = mysqli_query($db, $sql);
			if (mysqli_num_rows($result)==1){
				session_start();
				$_SESSION['authenticated'] = 1;
				$_SESSION['email'] = $email;
				// $_SESSION['username']= $username;
			    header("location: ../auth/home.php");
			    }
			    else{
			    echo "Invalid Combination";
			    }			
			}
		}


?>
<html>
<body>

	<form method="POST">
		<input name = "email" type="email"> Email: </input>
		<input name = "password" type="password"> Password: </input>
		<button name = "submit" type="submit"> Log-In </button>
	</form>

</body>
</html>