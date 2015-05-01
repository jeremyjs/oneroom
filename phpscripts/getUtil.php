<?php
require_once 'connect.php';

if ( isset($_GET['userID']) ) {
  $userID = $_GET['userID'];
  $sql = "SELECT * FROM `utilities` Where userID = '$userID'";
  $result = mysqli_query($connection, $sql) or die(mysql_error());
  $count = mysqli_num_rows($result);
  $jsonData = array();
  while ($array = mysqli_fetch_row($result)) {
    $jsonData[] = $array;
  }

  echo json_encode($jsonData);
}
?>
