<?php

    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

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

    $sql = "SELECT * FROM user_1";
    $result = mysqli_query($conn,$sql); 
    $myArray = array();
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }
        print json_encode($myArray);
    } 
    else 
    {
        echo "0 results";
    }
?>