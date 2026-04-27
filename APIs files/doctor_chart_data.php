<?php

include 'config.php'; // Database connection

// Enable error reporting for debugging (you may want to disable this on production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set the response type as JSON
header("Content-Type: application/json");

$sql = "SELECT dlocation, COUNT(*) as total FROM doctordetails GROUP BY dlocation";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
$conn->close();
?>