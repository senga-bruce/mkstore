<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>logout</title>
</head>
<body>
    <div class="form_card">
        <form action="" method="post">
            <p>Are sure u want to logout?</p>
            <button type="submit" name="back" class="text-light"><a href="home.php">No</a></button>
            <button type="submit" name="logout">Yes</button>
        </form>
    </div>
</body>
</html>
<?php
session_start();
    include 'config/connection.php';
if (isset($_POST['logout'])) {

    session_destroy();
    header('location:index.html');
}

?>
