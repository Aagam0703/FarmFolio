<?php
include 'config.php';
header("Content-Type: application/json");
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender_id = $_POST['sender_id'];
    $sender_type = $_POST['sender_type'];
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];
    $receiver_type = $_POST['receiver_type']; 

    if (!empty($sender_id) && !empty($sender_type) && !empty($receiver_id) && !empty($message) && !empty($receiver_type)) {
        $stmt = $conn->prepare("INSERT INTO messages (sender_id, sender_type, receiver_type, receiver_id, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issis", $sender_id, $sender_type, $receiver_type, $receiver_id, $message);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Message sent successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Missing parameters!"]);
    }
}

$conn->close();
?>