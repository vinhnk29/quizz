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

    //Check value from submit form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = "";
        $score = 0;
        if(isset($_POST["name"])) { $name = $_POST['name']; }
        if(isset($_POST["score"])) { $score = (int)$_POST['score']; }

        $sql2 = "SELECT name FROM ranking where name = '".$_POST['name']."'";
        $nameExit = $conn->query($sql2);
        if ($nameExit->num_rows>0) {
            echo "<p>Your name has existed</p>";
        } else {
            $sql = "INSERT INTO ranking (name, score) VALUES ('" . $name . "','" . $score . "')";
            if ($conn->query($sql) === TRUE) {
                header("location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    $conn->close();