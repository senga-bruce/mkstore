<?php

    include 'config/connection.php';

    $error = '';

    if(isset($_POST['save_product'])){

        $productname = $_POST['pname'];
        $unitprice = $_POST['uprice'];
        $quantity = $_POST['quantity'];

        $totalprice = floatval($unitprice) * floatval($quantity);
        

        $sql = "INSERT INTO product VALUES('','$productname','$unitprice','$quantity','$totalprice',NOW())";

        mysqli_query($conn,$sql);

        header('location:productlist.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form_card">
        <form action="" method="post">
            <h3>Add New Product</h3>
            <p><?php echo $error;?></p>
            <input type="text" placeholder="Product Name" name="pname" required>
            <input type="number" placeholder="Enter Unit Price" name="uprice" required>
            <input type="number" placeholder="Enter Quantity (in Kgs)" step="0.01" name="quantity" required>
            <button type="submit" name="save_product">Save Product</button>
            <button type="submit" name="product_list">View Product List</button>

            <?php
            
                include 'config/connection.php';

                if(isset($_POST['product_list'])){
                    header('location:productlist.php');
                }
            ?>
        </form>
    </div>
</body>
</html>