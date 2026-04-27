<?php

include 'config.php'; // Database connection

// Enable error reporting for debugging (you may want to disable this on production)
ini_set('display_errors', 1);

error_reporting(E_ALL);

if (isset($_COOKIE['fid'])) {
    $fid = $_COOKIE['fid'];

    $stmt = $conn->prepare("SELECT gender FROM cattledetails WHERE fid = ?");
    $stmt->bind_param("i", $fid);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
} else {
    echo json_encode(["error" => "No farmer cookie found"]);
}
?>