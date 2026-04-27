<?php
include 'config.php';
$sql = "SELECT * FROM productdetails";
$result = $conn->query($sql);
$response = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    echo json_encode($response);
} else {
    echo json_encode([]);
}
$conn->close();
?>