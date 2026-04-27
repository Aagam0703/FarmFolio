<?php
include 'config.php'; // connects to MySQL

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fnumber = $_POST['fnumber'] ?? null;

    if (!$fnumber) {
        echo json_encode(["status" => "error", "message" => "Missing fnumber"]);
        exit;
    }

    $stmt = $conn->prepare("SELECT fid FROM farmerdetails WHERE fnumber = ?");
    $stmt->bind_param("s", $fnumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $fid = $row['fid'];
        // Set fid as a cookie
        setcookie("fid", $fid, time() + (86400 * 30), "/"); // 30 days
        echo json_encode(["status" => "success", "fid" => $fid]);
    } else {
        echo json_encode(["status" => "failure", "message" => "farmer not found"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>