<?php
  require('connect.php');

  if (isset($_GET['userID']) && isset($_GET['utilName']) && isset($_GET['state']))
  {
    $userID  = $_GET['userID'];
    $utilName = $_GET['utilName'];
    $state  = $_GET['state'];

    $query =  "UPDATE `utilities` SET state ='$state' WHERE utilName ='$utilName'";
    $result = mysqli_query($connection, $query);

    if($result){
      echo "1";

      if ($userID == 1) {
        if ($utilName == 'Lights' && $state == '1') {
          $payload = file_get_contents('http://104.254.216.237/oneroom/phpscripts/client.php?action=on/Lights');
        }
        else if ($utilName == 'Lights' && $state == '0') {
          $payload = file_get_contents('http://104.254.216.237/oneroom/phpscripts/client.php?action=off/Lights');
        }
        else if ($utilName == 'Speakers' && $state == '1') {
          $payload = file_get_contents('http://104.254.216.237/oneroom/phpscripts/client.php?action=play/short');
        }
      }
    }
    else {
      echo "-1";
    }
  }

  if (isset($_POST['userID']) && isset($_POST['utilName']) && isset($_POST['state']))
  {
    $userID  = $_POST['userID'];
   	$utilName = $_POST['utilName'];
    $state  = $_POST['state'];

    $query =  "UPDATE `utilities` SET state ='$state' WHERE utilName ='$utilName'";
    $result = mysqli_query($connection, $query);

    if($result){
      echo "1";
      
      if ($userID == 1) {
        if ($utilName == 'Lights' && $state == '1') {
          $payload = file_get_contents('http://104.254.216.237/oneroom/phpscripts/client.php?action=on/Lights');
        }
        else if ($utilName == 'Lights' && $state == '0') {
          $payload = file_get_contents('http://104.254.216.237/oneroom/phpscripts/client.php?action=off/Lights');
        }
        else if ($utilName == 'Speakers' && $state == '1') {
          $payload = file_get_contents('http://104.254.216.237/oneroom/phpscripts/client.php?action=play/short');
        }
      }
    } else {
      echo "-1";
    }
  }
?>