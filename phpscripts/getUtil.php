<?php
require_once 'connect.php';

if ( isset($_GET['utilID']) ) {
  $utilID = $_GET['utilID'];
  $sql = "SELECT * FROM `utilities` Where utilID = '$utilID'";
  $result = mysqli_query($connection, $sql) or die(mysql_error());
  echo json_encode($result);

  // $count = mysqli_num_rows($result);
  // $jsonData = array();
  // while ($array = mysqli_fetch_row($result)) {
  //   $jsonData[] = $array;
  // }

  // echo json_encode($jsonData);
}
?>
