<?php
include 'config.php'; // Your database connection file
ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_COOKIE['fid'])) {
        echo json_encode(["status" => "fail", "message" => "Farmer not logged in"]);
        exit;
    }

    $fid = $_COOKIE['fid'];
    $did = $_POST['did'] ?? '';
    $appointment_time = $_POST['appointment_time'] ?? ''; // Appointment time

    // Check if all necessary data is available
    if (empty($fid) || empty($did) || empty($appointment_time)) {
        echo json_encode(["status" => "error", "message" => "Missing fields"]);
        exit;
    }

    // Insert appointment into the database
    $stmt = $conn->prepare("INSERT INTO appointments (fid, did, appointment_time) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $fid, $did, $appointment_time);

    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo json_encode(["status" => "fail", "message" => $stmt->error]);
    }

    // Close the prepared statement
    $stmt->close();
}

$conn->close(); // Close the database connection
?>