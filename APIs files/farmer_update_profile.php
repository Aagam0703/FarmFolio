<?php
include 'config.php'; // connects to MySQL

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

if (!isset($_COOKIE['fid'])) {
    echo json_encode(["status" => "error", "message" => "Not logged in"]);
    exit;
}

$fid = $_COOKIE['fid'];
$fname = $_POST['fname'] ?? '';
$fnumber = $_POST['fnumber'] ?? '';
$faddress = $_POST['faddress'] ?? '';

if (empty($fname) || empty($fnumber) || empty($faddress)) {
    echo json_encode(["status" => "error", "message" => "Missing fields"]);
    exit;
}

$stmt = $conn->prepare("UPDATE farmerdetails SET fname = ?, fnumber = ?, faddress = ? WHERE fid = ?");
$stmt->bind_param("sssi", $fname, $fnumber, $faddress, $fid);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Profile updated"]);
} else {
    echo json_encode(["status" => "error", "message" => "Update failed: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
