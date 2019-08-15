<!DOCTYPE html>
<html>

<body>					
<?php
		session_start();	
	  	$id=$_GET['action'];
	  	$question = $_GET['question'];
/*	  	echo $id;*/
		$dbz = mysqli_connect("localhost", "root", "", "sold");
	  	$query = "SELECT `answer` from `ans` WHERE `qid`='$id'";
	  	$result = mysqli_query($dbz, $query);


	  	if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 1){		//If user is authenticated.
	  		if (mysqli_num_rows($result)==0) {													//AND No answeres yet available
	  			echo <<<EOD
<div style ='background-color:black; font:30px/21px Raleway;color:#00FF00;text-align: center;'>
    <span>
		Question unanswered.
    </span>
</div>
<a href="auth/answer_this.php?id=$id"> Answer This Question </a>
EOD;
	  		}
	  	else{																					//AND Answers available
	  	echo <<<EOD
<div style ='background-color:black; font:30px/21px Raleway;color:#FF0000;text-align: center;'>
    <span>
		add another answer,	
    </span>
<a href="auth/answer_this.php?id=$id"> Answer This Question </a>
</div>	
EOD;
	  		}
		}



	else{
		if(mysqli_num_rows($result) == 0){																//If user is anon
		echo <<<EOD
<div style ='background-color:black; font:30px/21px Raleway;color:#FF0000;text-align: center;'>
    <span>
		Question unanswered.
    </span>
<a href="../login/login.php"> Login To Answer </a>
</div>	
EOD;
		}
		else{
			echo <<<EOD
<div style ='background-color:black; font:30px/21px Raleway;color:#FF0000;text-align: center;'>
    <span>
    </span>
<a href="login/login.php"> Login To Answer </a>
</div>	
EOD;
		}
	}


	if(mysqli_num_rows($result) != 0){
		echo "<div class=\"container\">";
		echo "<div class=\"question\">";
	  	echo $question;
	  	echo "</div>";
		
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<div class='answer'>{$row['answer']}</div>";
		}
		echo "</div>";
		echo "</div>";
	}
?>

</body>
</html>