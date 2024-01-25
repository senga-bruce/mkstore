<?php
include 'config/connection.php';
$deleteid = $_GET['deleteid'];
$delete = "DELETE FROM product WHERE farmid='$deleteid'";
mysqli_query($conn,$delete);
header("location:productlist.php");

?>
