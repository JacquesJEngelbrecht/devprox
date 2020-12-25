<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "devprox";

// Connect to db
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


