<?php
  require('connect.php');

  if (isset($_GET['utilID']) && isset($_GET['state']))
  {
    $utilID = $_GET['utilID'];
    $state  = $_GET['state'];

    $query =  "UPDATE `utils`
               SET state = $state
               WHERE utilID = $utilID";
    $result = mysqli_query($connection, $query);

    if($result){
      echo "utilID updated";
    } else {
      echo "-1";
    }
  }

  if (isset($_POST['utilID']) && isset($_POST['state']))
  {
    $utilID = $_POST['utilID'];
    $state  = $_POST['state'];

    $query =  "UPDATE `utils`
               SET state = $state
               WHERE utilID = $utilID";
    $result = mysqli_query($connection, $query);

    if($result){
      echo "utilID updated";
    } else {
      echo "-1";
    }
  }
?>
