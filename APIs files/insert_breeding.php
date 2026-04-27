<?php
include 'config.php'; // DB connection

ini_set('display_errors', 1);

error_reporting(E_ALL);

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_COOKIE['fid'])) {
        echo json_encode(["status" => "fail", "message" => "Farmer not logged in"]);
        exit;
    }

    $fid = $_COOKIE['fid'];
    $tagno = $_POST['tagno'] ?? '';
    $breeding_status = $_POST['breeding_status'] ?? '';
    $last_breeding_date = $_POST['last_breeding_date'] ?? null;
    $expected_calving_date = $_POST['expected_calving_date'] ?? null;

    // Sanitize input
    $tagno = mysqli_real_escape_string($conn, $tagno);
    $breeding_status = mysqli_real_escape_string($conn, $breeding_status);

    // Only format dates if needed
    if (in_array($breeding_status, ['Pregnant', 'Artificial Insemination'])) {
        $last_breeding_date = formatDateOrNull($last_breeding_date);
        $expected_calving_date = formatDateOrNull($expected_calving_date);
    } else {
        $last_breeding_date = null;
        $expected_calving_date = null;
    }

    $query = "INSERT INTO breedingdetails (fid, tagno, breeding_status, last_breeding_date, expected_calving_date) 
              VALUES ('$fid', '$tagno', '$breeding_status', " .
              ($last_breeding_date ? "'$last_breeding_date'" : "NULL") . ", " .
              ($expected_calving_date ? "'$expected_calving_date'" : "NULL") . ")";

    if (mysqli_query($conn, $query)) {
        echo "Breeding details inserted successfully!!";
    } else {
        echo json_encode(["status" => "fail", "message" => mysqli_error($conn)]);
    }

} else {
    echo json_encode(["status" => "fail", "message" => "Invalid request"]);
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