<?php
	// get the q parameter from URL
	include 'var_and_functions.php';

	$connection = new mysqli($servername, $username, $password, $dbName);
    if ($connection->connect_error) { 
        die("Connection failed : " . $connection->connect_error);
    }
    else {
		$username = $_GET["username"];
		$email = $_GET["email"];

        $username_sql = "SELECT * FROM user_data where username= '$username'";
        $email_sql = "SELECT * FROM user_data where email= '$email'";
        $username_result = $connection->query($username_sql);
        $email_result = $connection->query($email_sql);

        $checkmark = "&#10004";
        $crossmark = "&#10006";


        // Pengecekan username
        if ($username_result->num_rows > 0) {
            $username_message = $crossmark;
        }
        else {
            $username_message = $checkmark;
        }
        // Pengecekan email
        if ($email_result->num_rows > 0) {
            $email_message = $crossmark;
        }
        else {
            $email_message = $checkmark;
        }
        $response = new stdClass();
        $response->username= $username_message;
        $response->email= $email_message;
        $response = json_encode($response);
        echo $response;
    }
?>