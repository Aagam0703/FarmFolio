<?php
include 'config.php';

if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];

    $sql = "DELETE FROM productdetails WHERE pid = $pid";

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