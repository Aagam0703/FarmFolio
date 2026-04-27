<?php

include 'config.php'; // connects to MySQL

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

$sql = "SELECT DISTINCT dlocation FROM doctordetails";
$result = $conn->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>
