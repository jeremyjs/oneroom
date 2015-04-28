<?php
	require('connect.php');
	
	if (isset($_GET['scheduleID']) && isset($_GET['begin']))
	{
        $scheduleID = $_GET['scheduleID'];
		$begin = $_GET['begin'];

	
        $query = 	"UPDATE `schedules`
					SET begin = $begin 
					WHERE scheduleID = $scheduleID";
        $result = mysqli_query($connection, $query);
	
        if($result){
			echo "beging updated";
        }else{
			echo "-1";
		}
    }
	
    else if (isset($_POST['scheduleID']) && isset($_GET['begin']))
	{
        $scheduleID = $_POST['scheduleID'];
		$begin = $_POST['begin'];

	
        $query = 	"UPDATE `schedules`
					SET begin = $begin 
					WHERE scheduleID = $scheduleID";
        $result = mysqli_query($connection, $query);
	
        if($result){
			echo "beging updated";
        }else{
			echo "-1";
		}
    }
    ?>