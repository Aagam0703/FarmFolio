<?php
include 'config.php'; // Database connection

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


header("Content-Type: application/json");

// Check request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Check if user is logged in via COOKIE
    if (!isset($_COOKIE['fid'])) {
        echo json_encode(["status" => "fail", "message" => "Farmer not logged in (cookie missing)."]);
        exit;
    }

    $fid = $_COOKIE['fid'];

    // Fetch health data for the logged-in farmer
    $query = "SELECT * FROM healthdetails WHERE fid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $fid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $healthData = [];
        while ($row = $result->fetch_assoc()) {
            $healthData[] = $row;
        }
        echo json_encode(["status" => "success","data" => $healthData]);
    } else {
        echo json_encode([
            "status" => "fail","message" => "No health found for this farmer."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "fail","message" => "Invalid request method."]);
}

$conn->close();
?>