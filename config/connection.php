<?php 
    $conn = mysqli_connect("localhost", "root", "", "mkstore");
    if(!$conn) {
        die("Database connection error:". mysqli_connect_error());
    }
?>