<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "vinh629220";
    $dbname = "quizmasterdev";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql1 = "SELECT name, score FROM ranking ORDER BY score DESC LIMIT 5";
    $result = $conn->query($sql1);
