
<?php
    include 'config/connection.php';

    $error = '';
    if(isset($_POST['update_user'])){
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(strlen($password) < 8){
            $error = "Password Must Have 8 characters";
        }

        //Check if Username has been taken 

        $query = "SELECT * FROM client WHERE username='$username' LIMIT 1";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0){
            $error = "Username Taken";
        }

        $password = md5($password);


        //insert User into DB

        if(empty($error)){

            $query = "INSERT INTO client VALUES('','$firstname','$lastname','$username','$password')";
            $save_user = mysqli_query($conn,$query);
    
            if($save_user){
                header('location: login.php');
            }else{
                $error = "Error While creating an account";
            }
        }

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update || SignedUp Credential</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form_card">
        
        <?php
            
            include 'config/connection.php';
            
            if (isset($_POST['update_user'])) {
                
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                if(strlen($password) < 8){
                    $error = "Password Must Have 8 characters";
                }
                
                $query = "SELECT * FROM client WHERE username='$username' LIMIT 1";
                $result = mysqli_query($conn,$query);
                
                if(mysqli_num_rows($result) > 0){
                    $error = "Username Taken";
                }
                
                $password = md5($password);
                
                
                //insert User into DB
                
                if(empty($error)){
                    
                    $query = "UPDATE client SET firstname='$firstname',lastname='$lastname',username='$username',password='$password'";
                    $save_user = mysqli_query($conn,$query);
                    
                    if($save_user){
                        header('location: clientlist.php');
                    }else{
                        $error = "Error While updating an account";
                    }
                }
                # code...
            }
            
            ?>
        <h3>Update User</h3>
        <?php if(!empty($error)){ ?>
            <p class="error"><?php echo $error; ?></p> 
            <?php } ?>
            <form action="" method="post">
                <?php
            include 'config/connection.php';
            
            $updateid = $_GET['update'];
            $select = "SELECT * FROM client WHERE id='$updateid'";
            $result = mysqli_query($conn,$select);
            
            while ($rows = mysqli_fetch_assoc($result)) {
                ?>
            <input type="text" placeholder="First Name" value="<?php echo $rows['firstname']?>" name="firstname">
            <input type="text" placeholder="Last Name" value="<?php echo $rows['lastname']?>" name="lastname">
            <input type="text" placeholder="Username" value="<?php echo $rows['username']?>" name="username">
            <input type="password" placeholder="Create Password" value="<?php echo $rows['password']?>" name="password">
            
            <?php
            }
            ?>            
            <button type="submit" name="update_user">Update</button>
            <p>Already Have an account?<a href="login.php">login</a></p>
            <p><a href="clientlist.php"> <<-Back</a></p>
        </form>
    </div>
    
</body>
</html>