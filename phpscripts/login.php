<?php
	require_once 'connect.php';

	if (isset($_GET['email']) && isset($_GET['password'])) {
		$email = $_GET['email'];
		$password = $_GET['password'];
		$password = hash('sha512',$password); 		

		$sql = "SELECT * FROM `user` WHERE email='$email' and password='$password'";
		$result = mysqli_query($connection, $sql) or die(mysql_error());
		$count = mysqli_num_rows($result);
		if ($count == 1){
			$array = mysqli_fetch_row($result);
			echo json_encode($array);
			//echo "You are logged in";
		}else {
			//$msg = "User Logged in Failed.";
			echo "Login Failed";
		}
	}

	else if (isset($_POST['email']) && isset($_POST['password'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password = hash('sha512',$password); 

		$sql = "SELECT * FROM `user` WHERE email='$email' and password='$password'";
		$result = mysqli_query($connection, $sql) or die(mysql_error());
		$count = mysqli_num_rows($result);
		if ($count == 1){
			$msg = "1";
			$array = mysqli_fetch_row($result);
			echo json_encode($array);
		}else {
			$msg = "-1";
			echo "Login Failed";
			
		}
	}
?>
<?php
	if(isset($msg) & !empty($msg)){
		echo $msg;
	}
 ?>