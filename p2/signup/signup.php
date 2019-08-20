<!DOCTYPE html>
<html>
<body>
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

	<form method="POST" >
		<table>
			<tr>
				<td class="inpf">Username:</td>
				<td><input type="text" required name="username" class="textInput"></td>
			</tr>
			<tr>
				<td class="inpf">Email:</td>
				<td><input type="email" required name="email" class="textInput"></td>
			</tr>
			<tr>
				<td class="inpf">Password:</td>
				<td><input type="password" required name="password" class="textInput"></td>
			</tr>
			<tr>
				<td class="inpf">Re-enter Password:</td>
				<td><input type="password" required name="rpassword" class="textInput"></td>
			</tr>
			<tr>
				<td>Already a user? <a href="/p2/login/login.php">login here</a></td>
				<td><input type="submit" name="submit" value="Register"></td>
			</tr>
		</table>
	</form>
	
</body>
</html>
