<?php
// Unset the fid cookie
setcookie("fid", "", time() - 3600, "/"); // expire it in the past
echo json_encode(["status" => "success", "message" => "Logged out"]);
?>
