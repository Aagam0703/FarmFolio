<?php
include 'config.php';  // Database connection file

// Get data from POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $fnumber = $_POST['fnumber'];
    $flocation = $_POST['flocation'];
    
    // Insert Query
    $sql = "INSERT INTO farmerdetails (fname, fnumber, flocation) VALUES ('$fname', '$fnumber', '$flocation')";

    if ($conn->query($sql) === TRUE) {
        echo "Farmer data inserted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid Request!";
}

$conn->close();
?>