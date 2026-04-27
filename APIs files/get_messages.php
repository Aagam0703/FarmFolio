<?php
include 'config.php';
header("Content-Type: application/json");
ini_set('display_errors', 1);
error_reporting(E_ALL);

$sender_id = $_GET['sender_id'] ?? null;
$receiver_id = $_GET['receiver_id'] ?? null;

if (!$sender_id || !$receiver_id) {
    echo json_encode(["status" => "error", "message" => "Missing sender_id or receiver_id"]);
    exit;
}

$sql = "SELECT * FROM messages 
        WHERE (sender_id = ? AND receiver_id = ?) 
           OR (sender_id = ? AND receiver_id = ?)
        ORDER BY timestamp ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iiii", $sender_id, $receiver_id, $receiver_id, $sender_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];

while ($row = $result->fetch_assoc()) {
    $messages[] = [
        "message" => $row['message'],
        "sender_type" => $row['sender_type'],
        "timestamp" => $row['timestamp'],
        "sender_id" => $row['sender_id'],
        "receiver_id" => $row['receiver_id']
    ];
}

echo json_encode($messages);

$stmt->close();
$conn->close();
?>