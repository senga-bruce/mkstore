<?php
     
     session_start();

    //include config file
    include 'config/connection.php';

    $error = '';
    if(isset($_POST['logUser'])){

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //check If userame exists

        $query = "SELECT * FROM client WHERE username = '$username'LIMIT 1";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) > 0 ){
            $row = mysqli_fetch_assoc($result);

            //check if password is correct

            if($row['password'] == $password){
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $username;
                header('location:home.php');
            }else{
                $error = "Wrong Password, try again";
            }
        }else{
            $error = "Username Doesn't Exist!";
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || App</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        body{
            background: whitesmoke;
        }
        a{
            text-decoration: none;
        }
        .form_card{
            width: 400px;
            background: #fff;
            margin: 30px auto;
            padding: 1%;
            border-radius: 10px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, .3);
            text-align: center;
        }
        .form_card h3{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        input{
            width: 100%;
            font-size: 16px;
            outline: none;
            padding: 6px 7px;
            margin-bottom: 5px;
            border: 2px solid #ccc;
            border-radius: 5px;

        }
        .form_card button{
            margin-top: 10px;
            width: 90%;
            padding: 10px 20px;
            background-color: #05f;
            border-style: none;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;

        }
        .form_card p{
            text-align: left;
            padding-left: 20px;
            margin: 20px 0 50px;
        }
        input:focus{
            border-bottom: #05f;
        }
    </style>
</head>
<body>
    <div class="form_card">
        <h3>Login Form</h3>
        <?php if(!empty($error)){ ?>
            <p class="error"><?php echo $error; ?></p> 
        <?php } ?>
        <form action="" method="post">
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="password" name="password">
            <button type="submit" name="logUser">Login</button>
            <p>No account yet?<a href="signup.php">create account</a></p>
            <p><a href="index.html"><<-Back</a></p>

        </form>
    </div>

</body>
</html>