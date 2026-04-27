<?php
include 'config.php';

header("Content-Type: application/json");

if (!isset($_COOKIE['did'])) {
    echo json_encode(["error" => "Doctor not logged in"]);
    exit;
}

$did = $_COOKIE['did'];

$query = "
    SELECT 
        a.id, 
        f.fname, 
        f.fnumber, 
        f.flocation, 
        a.appointment_time 
    FROM appointments a
    JOIN farmerdetails f ON a.fid = f.fid
    WHERE a.did = ?
    ORDER BY a.appointment_time DESC
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $did);
$stmt->execute();
$result = $stmt->get_result();

$appointments = [];

while ($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}

echo json_encode($appointments);
?>