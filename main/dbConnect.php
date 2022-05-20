<?php

    $serverName = 'localhost';

    $dbUsername = 'phpmyadmin';

    $dbPassword = 'mint';
    
    $dbName = 'myDB';

    $conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {

        exit("Connection failed: " . $conn->connect_error);

    } 
    
    else {

        echo "Database connected succesfully.<br>";

    }

?>