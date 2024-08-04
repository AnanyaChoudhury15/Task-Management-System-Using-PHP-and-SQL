    
<?php
    $host = "localhost";
    $username = "root";
    $password = ""; // Your MySQL password
    $database = "tms_db";
    $port = "3307"; // Replace with your new port number

    // Establish the connection
    $connection = mysqli_connect($host, $username, $password, $database, $port);
    
    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>