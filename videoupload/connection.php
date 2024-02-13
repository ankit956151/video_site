<?php 

    $conn = mysqli_connect("localhost", "root", "", "videosite");

    if(mysqli_connect_error()){
        echo "<script>alert('Not able to connect the database');</script>";
        exit();
    }
    
?>