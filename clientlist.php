<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h2 class="container my-5 ">CLIENT LIST</h2>
        <button type="submit" class="btn btn-primary" name="back"><a class="text-light" href="home.php">Home</a></button>

    <table width="400px" border="1" class="container my-5">
        <thead>
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Lats Names</th>
                <th>User Names</th>
                <th>Password</th>
                <th>Option1</th>
                <th>Option2</th>
            </tr>    
        </thead>
        
        
        <?php
    
    include 'config/connection.php';
    
    $sql = "SELECT * FROM client";
    $result = mysqli_query($conn,$sql);
    
    while ($rows = mysqli_fetch_assoc($result)) {
        ?>
        <tbody>
            <tr>
                <td><?php echo $rows['id']?></td>
                <td><?php echo $rows['firstname']?></td>
                <td><?php echo $rows['lastname']?></td>
                <td><?php echo $rows['username']?></td>
                <td><?php echo $rows['password']?></td>
                <td><button class="btn btn-primary col-lg-10 mt-1 my-1"><a class=" text-light nav nav-link" href="updateclient.php?update=<?php echo $rows['id']?>">Edit</a></button></td>
                <td><button type="submit" class="btn btn-danger col-lg-10 mt-1 my-1"><a class=" text-light nav nav-link" href="deleteclient.php?delete=<?php echo $rows['id']?>">Delete</a></button></td>
            </tr>
        </tbody>
        <?php
        # code...
    }
    
    ?>
    </table>
    </div>
</body>
</html>