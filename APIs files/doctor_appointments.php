<?php
include 'config.php';
header("Content-Type: application/json");

if (!isset($_GET['cookie'])) {
    echo json_encode(["error" => "No cookie provided"]);
    exit;
}

$cookie = $_GET['cookie']; // example: did_3
$did = explode("_", $cookie)[1];

$sql = "SELECT a.id, f.fname, f.fnumber, f.flocation, a.appointment_time
        FROM appointments a
        JOIN farmerdetails f ON a.fid = f.fid
        WHERE a.did = '$did'
        ORDER BY a.appointment_time DESC";
        
$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>