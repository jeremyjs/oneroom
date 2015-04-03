<?php
	require_once 'connect.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id']; 		

		$sql = "SELECT * FROM `user` WHERE id='$id'";
		$result = mysqli_query($connection, $sql) or die(mysql_error());
		$count = mysqli_num_rows($result);
		if ($count == 1){
			$array = mysqli_fetch_row($result);
			echo json_encode($array);
		}else {
			echo "User does not exist";
		}
	}

	if (isset($_POST['id'])) {
		$id = $_POST['id']; 		

		$sql = "SELECT * FROM `user` WHERE id='$id'";
		$result = mysqli_query($connection, $sql) or die(mysql_error());
		$count = mysqli_num_rows($result);
		if ($count == 1){
			$array = mysqli_fetch_row($result);
			echo json_encode($array);
		}else {
			echo "User does not exist";
		}
	}
?>