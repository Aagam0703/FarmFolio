<?php
include 'config.php';

if(isset($_POST['pid'], $_POST['pname'], $_POST['pdetails'], $_POST['ppacking'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pdetails = $_POST['pdetails'];
    $ppacking = $_POST['ppacking'];

    if(isset($_POST['pimage'])) {
        $imageData = $_POST['pimage'];
        $imageName = uniqid() . ".png";
        $path = "uploads/" . $imageName;
        if(file_put_contents($path, base64_decode($imageData))) {
            $sql = "UPDATE productdetails SET pname='$pname', pdetails='$pdetails', ppacking='$ppacking',pimage='$path' WHERE pid='$pid'";
        } else {
            echo "Image Upload Failed!";
            exit;
        }
    } else {
        $sql = "UPDATE productdetails SET pname='$pname', pdetails='$pdetails', ppacking='$ppacking' WHERE pid='$pid'";
    }

    echo ($conn->query($sql) === TRUE) ? "Product Updated Successfully!" : "Update Failed!";
} else {
    echo "Invalid Request!";
}
$conn->close();
?>
