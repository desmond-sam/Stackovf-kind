<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['search_button'])) {
		$term=$_POST['search_term'];

		$dbz = mysqli_connect("localhost", "root", "", "sold");
		$sqle = "SELECT qid, question FROM ques WHERE `question` LIKE '%$term%' ORDER BY qid ASC";
		$ndata = mysqli_query($dbz,$sqle) or die("Bad SQL: $sqle");

		echo "<div id='search_questioncontainer'>";
		while ($row = mysqli_fetch_assoc($ndata)) {
			$encoded = urlencode($row['question']);
			echo "<div class='section'><a class='insect' href='../querypage.php?action={$row['qid']}&question={$encoded}'>{$row['question']}</a><br></div>";
			}
		echo "</div>";
		}
	}	
  ?>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <div class="search-container">

    <form method="POST">
      <input type="text" placeholder="Search..." name="search_term">
      <button name ="search_button" type="submit"><i class="fa fa-search"></i></button>
    </form>
  <a id="b1" href="logout.php">logout</a>
  </div>
</div>
<?php
	session_start();
	if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated']!=1){
		$pl = "../anon/home.php";
		echo <<<EOD
<div style ='background-color:black; font:30px/21px Raleway;color:#FF0000;text-align: center;'>
    <span>
		You are not authorized to access this page. Redirecting...
    </span>
</div>		
<meta http-equiv=Refresh content=2.5;url=$pl>
EOD;
	}
	else{
					$dbz = mysqli_connect("localhost", "root", "", "sold");
					$sqle = "SELECT qid, question FROM ques ORDER BY qid ASC";
					$ndata = mysqli_query($dbz,$sqle) or die("Bad SQL: $sqle");

					echo "<div id='questioncontainer'>";
					while ($row = mysqli_fetch_assoc($ndata)) {
						$encoded = urlencode($row['question']);
						echo "<div class='section'><a class='insect' href='../querypage.php?action={$row['qid']}&question={$encoded}'>{$row['question']}</a><br></div>";
					}
	}


?>
</body>
</html>