<?php

	require('connect.php');	

	if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['email']) && isset($_GET['password'])){
        $id = $_GET['id'];
		$name = $_GET['name'];
		$email = $_GET['email'];
        $password = $_GET['password'];

		$salt = rand ( 0 , 1000 );
		$password = $password . $salt;
		$password = hash('sha512',$password);
	
        $query = "UPDATE `user` SET name='$name', password='$password', email='$email', salt='$salt' WHERE id='$id'";
        $result = mysqli_query($connection, $query);
		//$id = mysqli_insert_id($connection);
	
        if($result){
			echo $id;
			//mail('ldengelman@gmail.com', 'My Subject', $message);
        }else{
			echo "-1";
		}
    }
	
    // If the values are posted, insert them into the database.
	if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        $id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
        $password = $_POST['password'];

		$salt = rand ( 0 , 1000 );
		$password = $password . $salt;
		$password = hash('sha512',$password);
	
        $query = "UPDATE `user` SET name='$name', password='$password', email='$email', salt='$salt' WHERE id='$id'";
        $result = mysqli_query($connection, $query);
		$id = mysqli_insert_id($connection);
	
        if($result){
			echo $id;
			//mail('ldengelman@gmail.com', 'My Subject', $message);
        }else{
			echo "-1";
		}
    }
    ?>