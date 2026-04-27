<?php
include "config.php";
header('Content-Type: application/json');

if (!isset($_COOKIE['did'])) {
    echo json_encode(["error" => "Doctor not logged in"]);
    exit;
}

$did = $_COOKIE['did'];

$sql = "
    SELECT f.fid, f.fname, m.message AS last_message, m.timestamp
    FROM messages m
    JOIN farmerdetails f ON (f.fid = m.sender_id AND m.sender_type = 'farmer') 
                         OR (f.fid = m.receiver_id AND m.receiver_type = 'farmer')
    WHERE (m.sender_id = ? AND m.sender_type = 'doctor') 
       OR (m.receiver_id = ? AND m.receiver_type = 'doctor')
    ORDER BY m.timestamp DESC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $did, $did);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
$added = []; // prevent duplicate entries per farmer

while ($row = $result->fetch_assoc()) {
    $fid = $row['fid'];
    if (!isset($added[$fid])) {
        $data[] = $row;
        $added[$fid] = true;
    }
}

echo json_encode($data);
?>