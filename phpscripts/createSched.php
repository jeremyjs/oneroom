<?php
	require('connect.php');

	if (isset($_GET['utilID']) && isset($_GET['time']) && isset($_GET['state']))
	{

		$utilID = $_GET['utilID'];
		$time = $_GET['time'];
		$state = $_GET['state'];

        $query = "INSERT INTO `schedules` (utilID, time, state) VALUES ('$utilID', '$time', '$state')";
        $result = mysqli_query($connection, $query);
		$id = mysqli_insert_id($connection);

        if($result){
			echo $id;
        }else{
			echo "-1";
		}
  }

    else if (isset($_POST['utilID']) && isset($_POST['time']) && isset($_POST['state']))
	{

		$utilID = $_POST['utilID'];
		$time = $_POST['time'];
		$state = $_POST['state'];

        $query = "INSERT INTO `schedules` (utilID, time, state) VALUES ('$utilID', '$time', '$state')";
        $result = mysqli_query($connection, $query);
		$id = mysqli_insert_id($connection);

        if($result){
			echo $id;
        }else{
			echo "-1";
		}
    }
    ?>
