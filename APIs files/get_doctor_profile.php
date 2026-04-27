<?php
include 'config.php';
header("Content-Type: application/json");

if (!isset($_COOKIE['did'])) {
    echo json_encode(["success" => false, "message" => "doctor not logged in"]);
    exit;
}

$did = $_COOKIE['did'];

$sql = "SELECT * FROM doctordetails WHERE did = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $did);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode([
        "success" => true,
        "data" => $row
    ]);
} else {
    echo json_encode(["success" => false, "message" => "doctor not found"]);
}
?>