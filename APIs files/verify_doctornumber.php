<?php
include 'config.php'; // connects to MySQL

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dnumber = $_POST['dnumber'] ?? null;

    if (!$dnumber) {
        echo json_encode(["status" => "error", "message" => "Missing dnumber"]);
        exit;
    }

    $stmt = $conn->prepare("SELECT did FROM doctordetails WHERE dnumber = ?");
    $stmt->bind_param("s", $dnumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $did = $row['did'];
        // Set did as a cookie
        setcookie("did", $did, time() + (86400 * 30), "/"); // 30 days
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "failure", "message" => "doctor not found"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>