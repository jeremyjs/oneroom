<?php
$connection = mysqli_connect('localhost', 'oneroom', 'purdue13', 'oneroom');
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
/*$select_db = mysql_select_db('autopi');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}*/