<?php
  require('connect.php');

  if (isset($_GET['utilName']) && isset($_GET['state']))
  {
    $utilName = $_GET['utilName'];
    $state  = $_GET['state'];

    $query =  "UPDATE `utilities` SET state ='$state' WHERE utilName ='$utilName'";
    $result = mysqli_query($connection, $query);

    if($result){
      echo "1";
      if ($state == 1) {
        $payload = file_get_contents('http://104.254.216.237/oneroom/phpscripts/client.php?action=play/example');
      }
      else {
        //$payload = file_get_contents('http://104.254.216.237/oneroom/phpscripts/client.php?action=play/example');
      }
      
    } else {
      echo "-1";
    }
  }

  if (isset($_POST['utilName']) && isset($_POST['state']))
  {
   	$utilName = $_POST['utilName'];
    $state  = $_POST['state'];

    $query =  "UPDATE `utilities` SET state ='$state' WHERE utilName ='$utilName'";
    $result = mysqli_query($connection, $query);

    if($result){
      echo "1";
      $payload = file_get_contents('http://104.254.216.237/oneroom/phpscripts/client.php?action=play/example');
    } else {
      echo "-1";
    }
  }
?>