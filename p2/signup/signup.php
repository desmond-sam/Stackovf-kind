<!DOCTYPE html>

<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		echo "1st step";
		if ( isset($_POST['submit']) ){
			//Obtain data from form
			echo "2nd step";
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$rpassword = md5($_POST['rpassword']);
			if ($password!=$rpassword) {
				echo "passwords didnt match";

			}
			else{
				//Verify From Server
				echo "going for database";
				$db= mysqli_connect("localhost", "root", "", "sold");
				$sql = "INSERT INTO users(`username`, `password`, `mail-id`) VALUES('$username','$password','$email')";
				echo $sql;
				if (mysqli_query($db, $sql)) {
					echo "for query";
					session_start();
					$_SESSION['authenticated'] = 1;
					$_SESSION['email'] = $email;
					$_SESSION['username']= $username;
					$pl = "../auth/home.php";
					echo <<<EOD
<div style ='background-color:black; font:30px/21px Raleway;color:#00FF00;text-align: center;'>
    <span>
		account successfully created! redirecting to home page!!!
    </span>
</div>		
<meta http-equiv=Refresh content=2.5;url=$pl>
EOD;
				}
			}
		}
}

?>
<html>
<body>

	<form method="POST">
		<input type="name" required name="username"> Username: </input>
		<input name = "email" required type="email"> Email: </input>
		<input name = "password" required type="password"> Password: </input>
		<input name = "rpassword" required type="password"> Re-enter Password: </input>
		<button name = "submit" type="submit"> Sign up </button>
	</form>
</body>
</html>