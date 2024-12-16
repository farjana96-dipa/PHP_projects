<?php 

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'config.php';
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $cpas = $_POST['cpassword'];

    $user = false;
    $success = false;
    $inv = false;

    $select = "SELECT *FROM signup_table WHERE username='$username' AND password='$pass'  ";
    $select_res = mysqli_query($connect, $select);
    if($select_res){
        $num = mysqli_num_rows($select_res);
        if($num > 0){
            
            if($pass == $cpas){
                session_start();
                $user = true;
                $_SESSION['username'] = $username;
                header('location:home.php');
               
            }
            else if($pass != $cpas){
                $inv = true;
            }
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Signup Form</title>
</head>
<body>

         

<div class="container py-3">
        <?php  
                if($user){
                    echo '<div class="alert alert-warning" role="alert"><h3>You are Logged in!!</h3></div>';
                }
                
                else if($inv){
                    echo '<div class="alert alert-danger" role="alert"><h3>Opps!! Wrong Password.</h3></div>';
                }
            ?>
    <div class="row">
        <div class="col-md-12 p-5">
           
            <h2 class="mb-3">User Login Form</h2>
            <form action="login.php" class="form" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">UserName</label>
                    <input type="text" class="form-control" placeholder="Enter Your Username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>