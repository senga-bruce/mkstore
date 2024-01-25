<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2 class="my-5">PRODUCT LIST</h2>
        <button type="submit" class="btn btn-primary"><a class="text-light" href="home.php">Home</a></button>
    <table width="800px" border="1" class="container my-5">
        <thead>
            <tr>
                <th  colspan="8">
                    <a href="newproduct.php">Insert A new Product</a>
                </th>
            </tr> 
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date In</th>
                <th>Option1</th>
                <th>Option2</th>
            </tr>   
        </thead>
        
        
        <?php
    
    include 'config/connection.php';
    
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn,$sql);
    
    while ($rows = mysqli_fetch_assoc($result)) {
        ?>
        <tbody>
            <tr>
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['product_name'];?></td>
                <td><?php echo $rows['unitprice'];?></td>
                <td><?php echo $rows['quantity'];?></td>
                <td><?php echo $rows['totalprice'];?></td>
                <td><?php echo $rows['dateIn'];?></td>
                <td><button type="submit" class="btn btn-primary col-lg-10 mt-1 my-1"><a class="text-light nav nav-link" href="update.php?updateid=<?php echo $rows['id']?>">Edit</a></button></td>
                <td><button type="submit" class="btn btn-danger col-lg-10 mt-1 my-1"><a class="text-light nav nav-link" href="delete.php?deleteid=<?php echo $rows['id']?>">delete</a></button></td>
            </tr>
        </tbody>
        <?php
    } 
    ?>
    </table>
    </div>
</body>
</html>