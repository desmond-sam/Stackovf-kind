<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		if (isset($_POST['submit'])){
			if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']==1) {
				$id=$_GET['id'];
				$email=$_SESSION['email'];
				$answer=$_POST['ans'];
				$db= mysqli_connect("localhost", "root", "", "sold");
				$sql = "INSERT INTO ans(`qid`, `answer`, `mail-id`) VALUES('$id','$answer','$email')";
				if (mysqli_query($db,$sql)) {
					$pl = "home.php";
		echo <<<EOD
<div style ='font:30px/21px Raleway;color:#00FF00;text-align: center;'>
    <span>
		Thankyou for your support! Redirecting to home...
    </span>
</div>		
<meta http-equiv=Refresh content=2.5;url=$pl>
EOD;
				}
			}
		}
	}
?>
<form method="POST">
	
	<tr>
		<td>
			<input type="text" name="ans">
			<button type="submit" name="submit">Press Here</button>
		</td>			
	</tr>	

</form>
</body>
</html>