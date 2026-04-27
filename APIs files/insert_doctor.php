<?php
include 'config.php';  // Database connection file

// Get data from POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dname = $_POST['dname'];
    $dnumber = $_POST['dnumber'];
    $dlocation = $_POST['dlocation'];
    
    // Insert Query
    $sql = "INSERT INTO doctordetails (dname, dnumber, dlocation) VALUES ('$dname', '$dnumber', '$dlocation')";

    if ($conn->query($sql) === TRUE) {
        echo "Doctor data inserted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid Request!";
}

$conn->close();
?>