<?php
include 'config.php'; // connects to MySQL

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Check if 'fid' cookie is set
    if (!isset($_COOKIE['fid'])) {
        echo json_encode(["status" => "error", "message" => "User not logged in"]);
        exit;
    }

    $fid = $_COOKIE['fid'];
    $cattle_type = $_POST['cattle_type'] ?? '';
    $tagno = $_POST['tagno'] ?? '';
    $breed = $_POST['breed'] ?? '';
    $age = $_POST['age'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $weight = $_POST['weight'] ?? '';
    $height = $_POST['height'] ?? '';

    if (empty($cattle_type) || empty($tagno) || empty($breed) || empty($age) || empty($gender) || empty($weight) || empty($height)) {
        echo json_encode(["status" => "error", "message" => "All fields are required"]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO cattledetails (cattle_type, tagno, breed, age, gender, weight, height, fid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssi", $cattle_type, $tagno, $breed, $age, $gender, $weight, $height, $fid);

    if ($stmt->execute()) {
        echo "Cattle details added successfully!!";
    } else {
        echo json_encode(["status" => "error", "message" => "Insert failed: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
?>
