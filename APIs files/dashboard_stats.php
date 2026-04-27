<?php

include 'config.php'; // Database connection

// Enable error reporting for debugging (you may want to disable this on production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

$response = array();

// 1. Total Counts
$farmers = $conn->query("SELECT COUNT(*) as total FROM farmerdetails")->fetch_assoc();
$doctors = $conn->query("SELECT COUNT(*) as total FROM doctordetails")->fetch_assoc();
$products = $conn->query("SELECT COUNT(*) as total FROM productdetails")->fetch_assoc();

$response['totals'] = array(
    "farmers" => $farmers['total'],
    "doctors" => $doctors['total'],
    "products" => $products['total']
);

// 2. Farmers by Location
$flocation = array();
$f_sql = "SELECT flocation, COUNT(*) as total FROM farmerdetails GROUP BY flocation";
$f_result = $conn->query($f_sql);
while ($row = $f_result->fetch_assoc()) {
    $flocation[] = $row;
}
$response['farmers_by_location'] = $flocation;

// 3. Doctors by Location
$dlocation = array();
$d_sql = "SELECT dlocation, COUNT(*) as total FROM doctordetails GROUP BY dlocation";
$d_result = $conn->query($d_sql);
while ($row = $d_result->fetch_assoc()) {
    $dlocation[] = $row;
}
$response['doctors_by_location'] = $dlocation;

// 4. Cattle by Gender
$gender = array();
$c_sql = "SELECT gender, COUNT(*) as total FROM cattledetails GROUP BY gender";
$c_result = $conn->query($c_sql);
while ($row = $c_result->fetch_assoc()) {
    $gender[] = $row;
}
$response['cattle_by_gender'] = $gender;

// Output final JSON response
echo json_encode($response);
$conn->close();
?>