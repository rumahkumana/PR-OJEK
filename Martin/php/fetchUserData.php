<?php
	// get the q parameter from URL
	include 'var_and_functions.php';

	$connection = new mysqli($servername, $username, $password, $dbName);
    if ($connection->connect_error) { 
        die("Connection failed : " . $connection->connect_error);
    }
    else {
		$id_active = $_GET["id_active"];

        $sql = "SELECT * FROM user_data where ID='$id_active'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $ID = $row["ID"];
            $username = $row["username"];
            $full_name = $row["full_name"];
            $email = $row["email"];
            $phone = $row["phone"];
            $isDriver = $row["isDriver"];

            // CREATE JSON
            $response = new stdClass();
            $response->ID= $ID;
            $response->username= $username;
            $response->full_name= $full_name;
            $response->email= $email;
            $response->phone= $phone;
            
            if ($isDriver == "yes") {
                $sql = "SELECT * FROM driver_review WHERE driverID= '$ID'";
                $result = $connection->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $rating = $row["rating"];
                    $votes = $row["votes"];

                    $response->rating = $rating;
                    $response->votes = $votes;
                }
            }
            
        }

        $response = json_encode($response);
        echo $response;
    }
?>