<!DOCTYPE HTML>
<?php
    include 'var_and_functions.php';

    $connection = new mysqli($servername, $username, $password, $dbName);
    if ($connection->connect_error) { 
        die("Connection failed : " . $connection->connect_error);
    }
    else {
        $input_username = $_POST["username"];
        $input_password = $_POST["user-password"];

        $sql = "SELECT * FROM user_data where username= '$input_username'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row["password"] == $input_password) {
            	$id_active = $row["ID"];
                header("Location: profile.php?id_active=" . $id_active); // Username dan password benar                    
            }
            else {
            	header("Location: ../login.html");
                $errMessage = "Password yang anda masukkan salah";
            }
        }
        else {
        	header("Location: ../login.html");
            $errMessage = "Username tidak ada";
        }
    }
    echo $errMessage;
?>
</html>