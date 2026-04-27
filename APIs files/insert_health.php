<?php

include 'config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_COOKIE['fid'])) {
        echo json_encode(["status" => "fail", "message" => "Farmer not logged in"]);
        exit;
    }

    $fid = $_COOKIE['fid'];
    $tagno = $_POST['tagno'] ?? null;
    $health_type = $_POST['health_type'] ?? null;
    $health_date = $_POST['health_date'] ?? null;

    if (!$tagno || !$health_type || !$health_date) {
        echo json_encode(["status" => "fail", "message" => "Missing tagno, health_type, or health_date"]);
        exit;
    }

    $formattedDate = formatDateOrNull($health_date);
    if (!$formattedDate) {
        echo json_encode(["status" => "fail", "message" => "Invalid date format. Expecting dd-MM-yyyy"]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO healthdetails (fid, tagno, health_type, health_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $fid, $tagno, $health_type, $formattedDate);

    if ($stmt->execute()) {
        echo "Health details inserted successfully!";
    } else {
        echo json_encode(["status" => "fail", "message" => $stmt->error]);
    }

    $stmt->close();
    $conn->close();

} else {
    echo json_encode(["status" => "fail", "message" => "Invalid request method"]);
}

// Helper function
function formatDateOrNull($date) {
    if ($date) {
        $dt = DateTime::createFromFormat('d-m-Y', $date);
        return $dt ? $dt->format('Y-m-d') : null;
    }
    return null;
}
?>