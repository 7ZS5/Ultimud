<?php

    $serverName = 'localhost';

    $dbUsername = 'phpmyadmin';

    $dbPassword = 'mint';

    $db = new mysqli($serverName, $dbUsername, $dbPassword);

    if ($db->connect_error) {

        exit("Connection failed: " . $db->connect_error);

    } 
    
    else {

        $connectResult = "Database connected succesfully.";

    }

?>
