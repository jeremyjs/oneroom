<?php
$address = '192.168.0.121';
$port = 51717;

if (isset($_GET['action'])) {

	$action = $_GET['action'];

	if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
	{
		$errorcode = socket_last_error();
		$errormsg = socket_strerror($errorcode);
		 
		die("Couldn't create socket: [$errorcode] $errormsg \n");
	}
	 
	echo "Socket created \n";
	 
	if(!socket_connect($sock , $address , $port))
	{
		$errorcode = socket_last_error();
		$errormsg = socket_strerror($errorcode);
		 
		die("Could not connect: [$errorcode] $errormsg \n");
	}
	 
	echo "Connection established \n";

	//$message = "play/jazz";
	 
	//Send the message to the server
	if( ! socket_send ( $sock , $action , strlen($action) , 0))
	{
		$errorcode = socket_last_error();
		$errormsg = socket_strerror($errorcode);
		 
		die("Could not send data: [$errorcode] $errormsg \n");
	}

	echo "Message send successfully \n";
	socket_close($sock);
}

if (isset($_POST['action'])) {

	$action = $_POST['action'];

	if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
	{
		$errorcode = socket_last_error();
		$errormsg = socket_strerror($errorcode);
		 
		die("Couldn't create socket: [$errorcode] $errormsg \n");
	}
	 
	echo "Socket created \n";
	 
	if(!socket_connect($sock , $address , $port))
	{
		$errorcode = socket_last_error();
		$errormsg = socket_strerror($errorcode);
		 
		die("Could not connect: [$errorcode] $errormsg \n");
	}
	 
	echo "Connection established \n";

	//$message = "play/jazz";
	 
	//Send the message to the server
	if( ! socket_send ( $sock , $action , strlen($action) , 0))
	{
		$errorcode = socket_last_error();
		$errormsg = socket_strerror($errorcode);
		 
		die("Could not send data: [$errorcode] $errormsg \n");
	}

	echo "Message send successfully \n";
	socket_close($sock);
}
?>