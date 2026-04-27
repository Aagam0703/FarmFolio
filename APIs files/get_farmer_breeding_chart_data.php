<?php

include 'config.php'; // Database connection

// Enable error reporting for debugging (you may want to disable this on production)
ini_set('display_errors', 1);

error_reporting(E_ALL);

if (!isset($_COOKIE['fid'])) {
    echo json_encode(["error" => "Unauthorized: fid cookie not set"]);
    exit;
}

$fid = $_COOKIE['fid'];

// Prepare the response
$response = [];

// Count Dry
$sql = "SELECT COUNT(*) AS dry_count FROM breedingdetails WHERE fid = ? AND breeding_status = 'Dry'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $fid);
$stmt->execute();
$stmt->bind_result($response['dry_count']);
$stmt->fetch();
$stmt->close();

// Count Pregnant
$sql = "SELECT COUNT(*) AS pregnant_count FROM breedingdetails WHERE fid = ? AND breeding_status = 'Pregnant'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $fid);
$stmt->execute();
$stmt->bind_result($response['pregnant_count']);
$stmt->fetch();
$stmt->close();

// Count Heat
$sql = "SELECT COUNT(*) AS heat_count FROM breedingdetails WHERE fid = ? AND breeding_status = 'Heat'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $fid);
$stmt->execute();
$stmt->bind_result($response['heat_count']);
$stmt->fetch();
$stmt->close();

// Count Calving
$sql = "SELECT COUNT(*) AS calving_count FROM breedingdetails WHERE fid = ? AND breeding_status = 'Upcoming Calving'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $fid);
$stmt->execute();
$stmt->bind_result($response['calving_count']);
$stmt->fetch();
$stmt->close();

// Output JSON
echo json_encode($response);
$conn->close();
?>