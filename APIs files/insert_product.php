<?php

include 'config.php'; // Database connection

// Enable error reporting for debugging (you may want to disable this on production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set the response type as JSON
header("Content-Type: application/json");

// Check if the necessary POST data is provided
if (isset($_POST['pname'], $_POST['pdetails'], $_POST['ppacking'], $_POST['pimage'])) {
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $pdetails = mysqli_real_escape_string($conn, $_POST['pdetails']);
    $ppacking = mysqli_real_escape_string($conn, $_POST['ppacking']);
    $pimage = $_POST['pimage']; // Base64 string

    // Define upload directory
    $upload_dir = "uploads/";

    // Get image extension from base64 string (optional but recommended for flexibility)
    function getImageExtension($base64_image) {
        if (preg_match('/^data:image\/(\w+);base64,/', $base64_image, $type)) {
            return strtolower($type[1]); // jpg, png, gif, etc.
        }
        return 'jpg'; // default
    }

    // Clean base64 input (in case data URI scheme is included)
    if (preg_match('/^data:image\/(\w+);base64,/', $pimage, $matches)) {
        $pimage = substr($pimage, strpos($pimage, ',') + 1);
    }

    $extension = getImageExtension($_POST['pimage']); // Get actual image extension
    $unique_id = uniqid("product_", true);
    $timestamp = time();
    $image_name = $unique_id . "_" . $timestamp . "." . $extension;
    $image_path = $upload_dir . $image_name;

    // Decode base64 image
    $image_data = base64_decode($pimage);
    if (file_put_contents($image_path, $image_data)) {
        // Prepare SQL query to insert the product data into the database
        $sql = "INSERT INTO productdetails (pname, pdetails, ppacking, pimage) VALUES ('$pname', '$pdetails', $ppacking,'$image_name')";

        // Execute the query and check for success
        if (mysqli_query($conn, $sql)) {
            // Respond with success
            echo  "Product inserted successfully!!";
        } else {
            // Respond with error from the query
            echo json_encode(['status' => 'error', 'message' => 'Error inserting product: ' . mysqli_error($conn)]);
        }
    } else {
        // If image saving fails
        echo json_encode(['status' => 'error', 'message' => 'Failed to save image']);
    }
} else {
    // If any required POST data is missing
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
}

// Close the database connection
mysqli_close($conn);

?>