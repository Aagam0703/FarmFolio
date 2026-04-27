<?php
include 'config.php';

header("Content-Type: application/json");

ini_set('display_errors', 1);

error_reporting(E_ALL);

if (!isset($_COOKIE['fid'])) {
    $response['status'] = 'error';
    $response['message'] = 'Farmer not logged in.';
    echo json_encode($response);
    exit();
}

$fid = $_COOKIE['fid'];

// Query breeding data for the logged-in farmer
$sql = "SELECT id, tagno, breeding_status, last_breeding_date, expected_calving_date
        FROM breedingdetails 
        WHERE fid = ?
        ORDER BY last_breeding_date DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $fid);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

if (!empty($data)) {
    echo json_encode([
        'status' => 'success',
        'data' => $data
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'No breeding records found'
    ]);
}

$conn->close();
?>