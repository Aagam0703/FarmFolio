<?php
include 'config.php';  // Database connection file

$query = "SELECT * FROM doctordetails";
$result = $conn->query($query);
$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);

$conn->close();
?>