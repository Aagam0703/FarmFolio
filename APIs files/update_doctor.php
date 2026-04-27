<?php
include 'config.php';  // Database connection file

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $did = $_POST['did'];
    $dname = $_POST['dname'];
    $dnumber = $_POST['dnumber'];
    $dlocation = $_POST['dlocation'];

    // Update Query
    $sql = "UPDATE doctordetails SET dname = '$dname', dnumber = '$dnumber', dlocation = '$dlocation' WHERE did = '$did'";

    if ($conn->query($sql) === TRUE) {
        echo "Doctor details updated successfully!";
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }
}
$conn->close();
?>