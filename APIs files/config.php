<?php
$host = "localhost"; // host
$user = "root";     // MySQL username
$pass = ""; //MySQL password
$db   = "farmfoliodb";  //database name

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set charset
$conn->set_charset("utf8");
?>