<?php
	require('connect.php');
	
	if (isset($_GET['username']) && isset($_GET['password'])){
        $username = $_GET['username'];
		$email = $_GET['email'];
        $password = $_GET['password'];
 
        $query = "INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($connection, $query);
        if($result){
            $msg = "User Created Successfully.";
        }
    }
	
    // If the values are posted, insert them into the database.
    else if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
 
        $query = "INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($connection, $query);
        if($result){
            $msg = "User Created Successfully.";
        }
    }
    ?>