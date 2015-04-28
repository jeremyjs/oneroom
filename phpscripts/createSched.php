<?php
	require('connect.php');
	
	if (isset($_GET['uID']) && isset($_GET['utilID']) && isset($_GET['begin']) && isset($_GET['end']))
	{
        $uID = $_GET['uID'];
		$utilID = $_GET['utilID'];
		$begin = $_GET['begin'];
		$end = $_GET['end'];
	
        $query = "INSERT INTO `schedules` (uID, utilID, begin, end) VALUES ('$uID', '$utilID', '$begin', '$end')";
        $result = mysqli_query($connection, $query);
		$id = mysqli_insert_id($connection);
	
        if($result){
			echo $id;
        }else{
			echo "-1";
		}
    }
	
    else if (isset($_POST['uID']) && isset($_POST['utilID']) && isset($_POST['begin']) && isset($_POST['end']))
	{
        $uID = $_POST['uID'];
		$utilID = $_POST['utilID'];
		$begin = $_POST['begin'];
		$end = $_POST['end'];
	
        $query = "INSERT INTO `schedules` (uID, utilID, begin, end) VALUES ('$uID', '$utilID', '$begin', '$end')";
        $result = mysqli_query($connection, $query);
		$id = mysqli_insert_id($connection);
	
        if($result){
			echo $id;
        }else{
			echo "-1";
		}
    }
    ?>