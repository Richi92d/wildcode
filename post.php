<?php

    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	
    $postdata = file_get_contents("php://input", true);
   
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "user";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    if(isset($_POST['name'])) $name=$_POST['name'];
     else      $name="";

// Add User
$sql = "INSERT INTO `user_1`(`id`, `name`) VALUES ('', '$name')";

    if ($conn->query($sql) === TRUE) {
        $myJSON = json_encode("New user created successfully");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
?>