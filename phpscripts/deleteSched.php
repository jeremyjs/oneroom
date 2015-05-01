<?php
	require('connect.php');
	
	if (isset($_GET['scheduleID']))
	{
        $scheduleID = $_GET['scheduleID'];

	
        $query = "DELETE FROM `schedules` WHERE scheduleID = $scheduleID";
        $result = mysqli_query($connection, $query);
	
        if($result){
			echo "deleted";
        }else{
			echo "-1";
		}
    }
	
    else if (isset($_POST['scheduleID']))
	{
        $scheduleID = $_POST['scheduleID'];

	
        $query = "DELETE FROM `schedules` WHERE scheduleID = $scheduleID";
        $result = mysqli_query($connection, $query);
	
        if($result){
			echo "deleted";
        }else{
			echo "-1";
		}
    }
    ?>