<?php

    include 'config/connection.php';

    $error = '';

    // if(isset($_POST['save_product'])){

    //     $productname = $_POST['pname'];
    //     $unitprice = $_POST['uprice'];
    //     $quantity = $_POST['quantity'];

    //     $totalprice = floatval($unitprice) * floatval($quantity);
        

    //     $sql = "INSERT INTO product VALUES('','$productname','$unitprice','$quantity','$totalprice',NOW())";

    //     mysqli_query($conn,$sql);

    //     header('location:productlist.php');
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form_card">
        <form action="" method="post">
<?php

include 'config/connection.php';

$error = '';

if(isset($_POST['update_product'])){

    $productname = $_POST['pname'];
    $unitprice = $_POST['uprice'];
    $quantity = $_POST['quantity'];

    $totalprice = floatval($unitprice) * floatval($quantity);
    

    $sql = "UPDATE product SET product_name='$productname',unitprice='$unitprice',quantity='$quantity',totalprice='$totalprice',datein=NOW()";

    mysqli_query($conn,$sql);

    header('location:productlist.php');
}

?>
            <h3>Update Product</h3>
            <p><?php echo $error;?></p>
            <?php
            include 'config/connection.php';
            $updateid = $_GET['updateid'];
            $select = "SELECT * FROM product WHERE id='$updateid'";
            $result = mysqli_query($conn,$select);
            while($rows = mysqli_fetch_assoc($result)){
                ?>
            <input type="text" placeholder="Product Name" value="<?php echo $rows['product_name']?> " name="pname" required>
            <input type="number" placeholder="Enter Unit Price" value="<?php echo $rows['unitprice']?>" name="uprice" required>
            <input type="number" placeholder="Enter Quantity (in Kgs)" value="<?php echo $rows['quantity']?>" step="0.01" name="quantity" required>
                <?php
            }
            ?>
            <button type="submit" name="update_product">Update</button>
            <p><a href="productlist.php"> <<-Back</a></p>


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