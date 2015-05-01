<?php
	require('connect.php');
	session_start();

	if ( isset($_GET['utilName']) && isset($_GET['state']) && isset($_GET['userID']) )
	{
		$utilName = $_GET['utilName'];
		$state = $_GET['state'];
		$userID = $_GET['userID'];
   		$query = "INSERT INTO `utilities` (utilName, state, userID) VALUES ('$utilName', '$state', '$userID')";
    	$result = mysqli_query($connection, $query);
		$id = mysqli_insert_id($connection);
        if($result){
			echo $id;
			if ($userID == 1) {
		    	$payload = file_get_contents("http://104.254.216.237/oneroom/phpscripts/client.php?action=add/$utilName");
      		}
        }else{
			echo "-1";
		}
   	}

	if ( isset($_POST['utilName']) && isset($_POST['state']) && isset($_POST['userID']) )
	{
		$utilName = $_POST['utilName'];
		$state = $_POST['state'];
		$userID = $_POST['userID'];
   		$query = "INSERT INTO `utilities` (utilName, state, userID) VALUES ('$utilName', '$state', '$userID')";
    	$result = mysqli_query($connection, $query);
		$id = mysqli_insert_id($connection);
        if($result){
			echo $id;
			if ($userID == 1) {
		    	$payload = file_get_contents("http://104.254.216.237/oneroom/phpscripts/client.php?action=add/$utilName");
      		}
        }else{
			echo "-1";
		}
   	}
?>