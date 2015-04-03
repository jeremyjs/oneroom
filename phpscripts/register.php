<?php

	require('connect.php');
	
	if (isset($_GET['name']) && isset($_GET['password']) && isset($_GET['email'])){
        $name = $_GET['name'];
		$email = $_GET['email'];
        $password = $_GET['password'];
	   $password = hash('sha512',$password);
 	
        $query = "INSERT INTO `user` (name, password, email) VALUES ('$name', '$password', '$email')";
        $result = mysqli_query($connection, $query);
        if($result){
		 $message = 'test';
			echo "1";
			//mail('ldengelman@gmail.com', 'My Subject', $message);
        }
		else
		{
			echo "-1";
		}
    }
	
    // If the values are posted, insert them into the database.
    else if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])){
        $name = $_POST['name'];
		$email = $_POST['email'];
        $password = $_POST['password'];
        $password = hash('sha512',$password);

        $query = "INSERT INTO `user` (name, password, email) VALUES ('$name', '$password', '$email')";
        $result = mysqli_query($connection, $query);
        if($result){
		$message = 'test';
		//mail($email,'OneRoom Registration',$message);
		echo "1";
        }
		else
		{
			echo "-1";
		}
    }
    ?>