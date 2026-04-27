<?php

include 'config.php'; // Database connection

// Enable error reporting for debugging (you may want to disable this on production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

$response = array();

$farmers = $conn->query("SELECT COUNT(*) as total FROM farmerdetails")->fetch_assoc();
$doctors = $conn->query("SELECT COUNT(*) as total FROM doctordetails")->fetch_assoc();
$products = $conn->query("SELECT COUNT(*) as total FROM productdetails")->fetch_assoc();
$cattles = $conn->query("SELECT COUNT(*) as total FROM cattledetails")->fetch_assoc();

$response['farmers'] = $farmers['total'];
$response['doctors'] = $doctors['total'];
$response['products'] = $products['total'];
$response['cattles'] = $cattles['total'];

echo json_encode($response);
$conn->close();
?>