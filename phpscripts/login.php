<?php
	require_once 'connect.php';

	if (isset($_GET['username']) && isset($_GET['password'])){
		$username = $_GET['username'];
		$password = $_GET['password'];
 
		$sql = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
		$result = mysqli_query($connection, $sql) or die(mysql_error());
		
		$count = mysqli_num_rows($result);
		if ($count == 1){
			//$array = mysql_fetch_row($result);
			//echo json_encode($array);
			//$msg = "User Logged in Successfully.";
			echo "You are logged in";
		}else {
			//$msg = "User Logged in Failed.";
			echo "Login Failed";
		}
	}

	else if (isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
 
		$sql = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
		$result = mysqli_query($connection, $sql) or die(mysql_error());
		$count = mysqli_num_rows($result);
		if ($count == 1){
			$msg = "1";
			//echo "You are logged in";
		}else {
			$msg = "-1";
			//echo "Login Failed";
		}
	}
?>
<?php
	if(isset($msg) & !empty($msg)){
		echo $msg;
	}
 ?>