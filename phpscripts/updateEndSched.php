<?php
	require('connect.php');
	
	if (isset($_GET['scheduleID']) && isset($_GET['end']))
	{
        $scheduleID = $_GET['scheduleID'];
		$end = $_GET['end'];
	
        $query = 	"UPDATE `schedules`
					SET end = $end 
					WHERE scheduleID = $scheduleID";
        $result = mysqli_query($connection, $query);
	
        if($result){
			echo "end updated";
        }else{
			echo "-1";
		}
    }
	
    else if (isset($_POST['scheduleID']) && isset($_GET['end']))
	{
        $scheduleID = $_POST['scheduleID'];
		$end = $_POST['end'];

	
        $query = 	"UPDATE `schedules`
					SET end = $end 
					WHERE scheduleID = $scheduleID";
        $result = mysqli_query($connection, $query);
	
        if($result){
			echo "end updated";
        }else{
			echo "-1";
		}
    }
    ?>