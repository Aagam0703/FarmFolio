<?php
include 'config.php'; // connects to MySQL

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

if (!isset($_COOKIE['did'])) {
    echo json_encode(["status" => "error", "message" => "Not logged in"]);
    exit;
}

$did = $_COOKIE['did'];

$stmt = $conn->prepare("SELECT * FROM doctordetails WHERE did = ?");
$stmt->bind_param("i", $did);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode([
        "status" => "success",
        "dname" => $row['dname'],
        "dnumber" => $row['dnumber'],
        "daddress" => $row['daddress']
    ]);
} else {
    echo json_encode(["status" => "error", "message" => "Profile not found"]);
}

$stmt->close();
$conn->close();
?>