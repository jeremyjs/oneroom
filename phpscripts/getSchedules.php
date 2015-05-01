<?php
	require_once 'connect.php';

	if (isset($_GET['utilID'])) {
		$utilID = $_GET['utilID']; 		

		$sql = "SELECT scheduleID, time, state FROM schedules WHERE utilID='$utilID'";
		$result = mysqli_query($connection, $sql) or die(mysql_error());
		$count = mysqli_num_rows($result);
		$jsonData = array();
		while ($array = mysqli_fetch_row($result)) {
			$jsonData[] = $array;
		}
		echo json_encode($jsonData);
		//json_encode()
		//$array = mysqli_fetch_row($result);
		/*while ($row = mysqli_fetch_assoc($result)) {
			echo $row['scheduleID'];
			echo $row['time'];
			echo $row['state'];
		}*/
		//echo json_encode($array);
		//echo $array;
	}
	
	if (isset($_POST['utilID'])) {
		$utilID = $_POST['utilID']; 		

		$sql = "SELECT * FROM `schedules` WHERE utilID=$utilID";
		$result = mysqli_query($connection, $sql) or die(mysql_error());
		$count = mysqli_num_rows($result);
		$jsonData = array();
		while ($array = mysqli_fetch_row($result)) {
			$jsonData[] = $array;
		}
		echo json_encode($jsonData);
		//$array = mysqli_fetch_row($result);
		/*while ($row = mysql_fetch_assoc($result)) {
			echo $row['scheduleID'];
			echo $row['time'];
			echo $row['state'];
		}*/
		//echo json_encode($array);
		//echo $array;
	}
?>