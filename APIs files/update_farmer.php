<?php
include 'config.php';  // Database connection file

if(isset($_POST['fname']) && isset($_POST['fnumber']) && isset($_POST['flocation'])) {
    $fid = $_POST['fid'];
    $fname = $_POST['fname'];
    $fnumber = $_POST['fnumber'];
    $flocation = $_POST['flocation'];

    // Update Query
    $sql = "UPDATE farmerdetails SET fname = '$fname', fnumber = '$fnumber' , flocation = '$flocation' WHERE fid = '$fid'";

    if ($conn->query($sql) === TRUE) {
        echo "Farmer details updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid Request!";
}

$conn->close();
?>