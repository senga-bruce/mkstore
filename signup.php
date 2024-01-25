
<?php
    include 'config/connection.php';

    $error = '';
    if(isset($_POST['createAccount'])){
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(strlen($password) < 4){
            $error = "Password Must Have 4 characters";
        }

        //Check if Username has been taken 

        $query = "SELECT * FROM client WHERE username='$username' LIMIT 1";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0){
            $error = "Username Taken";
        }

        //hash(hide) password

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
    <title>Login || Note Taking App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form_card">
        <h3>Create Account</h3>
        <?php if(!empty($error)){ ?>
            <p class="error"><?php echo $error; ?></p> 
        <?php } ?>
        <form action="" method="post">
            <input type="text" placeholder="First Name" name="firstname">
            <input type="text" placeholder="Last Name" name="lastname">
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Create Password" name="password">
            
            <button type="submit" name="createAccount">SignUp</button>
            <p>Already Have an account?<a href="login.php">login</a></p>
            <p><a href="index.html"><<-Back</a></p>

        </form>
    </div>

</body>
</html>