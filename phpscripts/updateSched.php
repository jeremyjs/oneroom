<?php
  require('connect.php');

  if (isset($_GET['scheduleID']) && isset($_GET['utilID']) && isset($_GET['state']) && isset($_GET['time']))
  {
    $scheduleID = $_GET['scheduleID'];
	$utilID = $_GET['utilID'];
    $state  = $_GET['state'];
	$time = $_GET['time'];

    $query =  "UPDATE `schedules` SET state ='$state', utilID ='$utilID', time ='$time' WHERE scheduleID ='$scheduleID'";
    $result = mysqli_query($connection, $query);

    if($result){
      echo "scheduleID updated";
    } else {
      echo "-1";
    }
  }

  if (isset($_POST['scheduleID']) && isset($_POST['utilID']) && isset($_POST['state']) && isset($_POST['time']))
  {
    $scheduleID = $_POST['scheduleID'];
	$utilID = $_POST['utilID'];
    $state  = $_POST['state'];
	$time = $_POST['time'];

    $query =  "UPDATE `schedules` SET state ='$state', utilID ='$utilID', time ='$time' WHERE scheduleID ='$scheduleID'";
    $result = mysqli_query($connection, $query);

    if($result){
      echo "scheduleID updated";
    } else {
      echo "-1";
    }
  }
?>
