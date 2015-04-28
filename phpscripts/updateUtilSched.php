<?php
	require('connect.php');

	if (isset($_GET['scheduleID']) && isset($_GET['utilID']))
	{
        $scheduleID = $_GET['scheduleID'];
		$utilID = $_GET['utilID'];

        $query = 	"UPDATE `schedules`
					SET utilID = $utilID
					WHERE scheduleID = $scheduleID";
        $result = mysqli_query($connection, $query);

        if($result){
			echo "utilID updated";
        }else{
			echo "-1";
		}
    }

    else if (isset($_POST['scheduleID']) && isset($_POST['utilID']))
	{
        $scheduleID = $_POST['scheduleID'];
		$utilID = $_POST['utilID'];


        $query = 	"UPDATE `schedules`
					SET utilID = $utilID
					WHERE scheduleID = $scheduleID";
        $result = mysqli_query($connection, $query);

        if($result){
			echo "utilID updated";
        }else{
			echo "-1";
		}
    }
    ?>
