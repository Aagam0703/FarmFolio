<?php
include 'config.php';

if (isset($_POST['fid'])) {
    $fid = $_POST['fid'];

    $sql = "DELETE FROM farmerdetails WHERE fid = $fid";

    if ($conn->query($sql) === TRUE) {
        echo "Deleted Successfully";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid Request!";
}

$conn->close();
?>