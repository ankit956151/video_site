<?php
 require('connection.php');
 session_start();
if(isset($_POST["filename"])) {
    $filename = $_POST["filename"];
    $filepath = "uploads/" . $filename;
    if (unlink($filepath)) {
        echo "Video deleted successfully.";
    } else {
        echo "Failed to delete the video.";
    }
}
?>
