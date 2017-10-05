<?php
	include 'var_and_functions'.php;

	$connection = new mysql($servername, $username, $password, $dbName);
    if ($connection->connect_error) { 
        die("Connection failed : " . $connection->connect_error);
    }
    else {
    	$message = "";  
    	$input_username = $_GET["username"];
    	$sql = "EXISTS(SELECT * FROM username_password WHERE username='$input_username'";
    	$result = $connection->query($sql);
    	if ($result) { // Username exist
    		$message = "Username already exists";
    	}
    	echo $input_username; 
    	echo $message;
    }
?>