<?php
  require('connect.php');

  if (isset($_GET['utilID']) && isset($_GET['utilName']) && isset($_GET['state']))
  {
    $utilID = $_GET['utilID'];
	$utilName = $_GET['utilName'];
    $state  = $_GET['state'];

    $query =  "UPDATE `utilities` SET state ='$state', utilName ='$utilName' WHERE utilID ='$utilID'";
    $result = mysqli_query($connection, $query);

    if($result){
      echo "utilID updated";
    } else {
      echo "-1";
    }
  }

  if (isset($_POST['utilID']) && isset($_POST['utilName']) && isset($_POST['state']))
  {
    $utilID = $_POST['utilID'];
	$utilName = $_POST['utilName'];
    $state  = $_POST['state'];

    $query =  "UPDATE `utilities` SET state ='$state', utilName ='$utilName' WHERE utilID ='$utilID'";
    $result = mysqli_query($connection, $query);

    if($result){
      echo "utilID updated";
    } else {
      echo "-1";
    }
  }
?>
