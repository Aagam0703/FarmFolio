<?php
include 'config.php';

$did = $_POST['did'];

$sql = "DELETE FROM doctordetails WHERE did=$did";

if ($conn->query($sql) === TRUE) {
    echo "Deleted Successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>