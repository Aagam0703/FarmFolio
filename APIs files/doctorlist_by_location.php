<?php
include 'config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

if (isset($_GET['dlocation'])) {
    $dlocation = $_GET['dlocation'];

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM doctordetails WHERE dlocation = ? ORDER BY dlocation DESC");
    $stmt->bind_param("s", $dlocation);
    $stmt->execute();

    $result = $stmt->get_result();
    $doctorList = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $doctorList[] = array(
                "did" => $row["did"],
                "dname" => $row["dname"],
                "dnumber" => $row["dnumber"],
                "dlocation" => $row["dlocation"]
            );
        }
    } else {
        $doctorList = array("message" => "No doctors found for this location.");
    }

    echo json_encode($doctorList);
    $stmt->close();
} else {
    echo json_encode(array("error" => "Missing 'dlocation' parameter."));
}

$conn->close();
?>