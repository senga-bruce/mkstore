<?php

    include 'config/connection.php';

    $delete = $_GET['delete'];
    $sql= "DELETE FROM client WHERE id='$delete' ";
    mysqli_query($conn,$sql);
    header('location:clientlist.php');


?>