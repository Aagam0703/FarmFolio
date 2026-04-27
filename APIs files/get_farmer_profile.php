<?php
include 'config.php';
header("Content-Type: application/json");

if (!isset($_COOKIE['fid'])) {
    echo json_encode(["success" => false, "message" => "Farmer not logged in"]);
    exit;
}

$fid = $_COOKIE['fid'];

$sql = "SELECT * FROM farmerdetails WHERE fid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $fid);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode([
        "success" => true,
        "data" => $row
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Farmer not found"]);
}
?>