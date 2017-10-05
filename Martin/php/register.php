<?php
    include 'var_and_functions.php';

    $connection = new mysqli($servername, $username, $password, $dbName);
    if ($connection->connect_error) { 
        die("Connection failed : " . $connection->connect_error);
    }
    else {  
        $input_username = $_POST["username"];
        $input_fullname = $_POST["user-fullname"];
        $input_email = $_POST["user-email"];      
        /*
        // Cek username and email availability
        $username_sql = "SELECT * FROM user_data where username= '$username'";
        $email_sql = "SELECT * FROM user_data where email= '$email'";
        $username_result = $connection->query($username_sql);
        $email_result = $connection->query($email_sql);

        $username_exist = False;
        $email_exist = False;
        if ($username_result->num_rows > 0) {
            $username_exist = True;
        }
        if ($email_result->num_rows > 0) {
            $email_exist = True;
        }

        // Input ke database atau tolak
        if (!$username_exist and !$email_exist) {
        */
        $input_password = $_POST["user-password"];
        $input_password_confirm = $_POST["user-password-confirm"];
        $input_phone = $_POST["user-phone"];
        $input_driverstatus = $_POST["user-driver-status"];
        if (isset($_POST["user-driver-status"])) {
            $driver_status = "yes";
        }
        else {
            $driver_status = "no";
        }
        $sql = "INSERT INTO user_data(username, password, full_name, email, phone, isDriver) VALUES ('$input_username', '$input_password', '$input_fullname', $input_email', '$input_phone', '$driver_status')";
        header('Location: ../login.html');
        
        /* }
        else {
            $message = "";
            if ($username_exist) {
                $message .= "Username sudah ada\n";
            }
            if ($email_exist) {
                $message .= "Email sudah ada\n";
            }
            echo $message;
        }
        */
    }
?>