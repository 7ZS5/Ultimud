<?php

include 'dbConnect.php';

if (isset($_POST['username'], $_POST['password'])) {

    $username = $_POST['username'];

    $password = $_POST['password'];

    $insert = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

    $insert->bind_param("ss", $username, $password);

    $insert->execute();

    if ($insert) {

        echo "Database insert successful.";

    }

    else {

        echo "Database insert failed.";

    }

}

?>