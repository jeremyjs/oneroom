<?php

	require('connect.php');
	
	if (isset($_GET['name']) && isset($_GET['password']) && isset($_GET['email'])){
        $name = $_GET['name'];
	$email = $_GET['email'];
        $password = $_GET['password'];

 	$salt = rand ( 0 , 1000 );
	$password = $password . $salt;
	$password = hash('sha512',$password);
	
        $query = "INSERT INTO `user` (name, password, email, salt) VALUES ('$name', '$password', '$email', '$salt')";
        $result = mysqli_query($connection, $query);
		$id = mysqli_insert_id($connection);
	
        if($result){
			echo $id;
			//mail('ldengelman@gmail.com', 'My Subject', $message);
        }else{
			echo "-1";
		}
    }
	
    // If the values are posted, insert them into the database.
    else if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])){
        $name = $_POST['name'];
		$email = $_POST['email'];
        $password = $_POST['password'];

	$salt = rand ( 0 , 1000 );
	$password = $password . $salt;
	$password = hash('sha512',$password);

        $query = "INSERT INTO `user` (name, password, email, salt) VALUES ('$name', '$password', '$email', '$salt')";
        $result = mysqli_query($connection, $query);
		$id = mysqli_insert_id($connection);
        if($result){
		//mail($email,'OneRoom Registration',$message);
		echo $id;
        }
		else
		{
			echo "-1";
		}
    }
    ?>