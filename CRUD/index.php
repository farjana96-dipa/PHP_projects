<?php
    include 'config.php';

    //$user = false;
    //$success = false;

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];
        $mobile = $_POST['mobile'];


        $select = " SELECT *FROM signup_table WHERE username = '$username' AND email = '$email' ";
        $query = mysqli_query($connect, $select);

        if($query){
            $num = mysqli_num_rows($query);
            if($num > 0){
               // $user = true;
                echo "
                    <div class='container pt-3'>
                        <div class='alert alert-warning'><h3>User Already Exist!!!</h3></div>
                    </div>
                ";

                
            }
            else{
                $insert = " INSERT INTO signup_table(username,email,password,cpassword,mobile) VALUES('$username','$email','$pass','$cpass','$mobile')";
                $query = mysqli_query($connect,$insert);
                if($query){
                    echo "
                        <div class='container pt-3'>
                            <div class='alert alert-info'><h3>Sing Up Successfull!!</h3></div>
                        </div>
                    ";

                    header('location:display.php');
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
    <link rel="stylesheet" href="style.css">
    <title>CRUD Projects</title>
</head>
<body>

         

<div class="container crform">
    <div class="row">
        <div class="col-md-12 py-2 main_form">
           <div class="title">
           <h2 class="">My SignUp Form</h2>
           </div>
          
            <form action="" class="form" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">UserName</label>
                    <input type="text" class="form-control" placeholder="Enter Your Username" name="username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email Address" name="email">
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
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" placeholder="Enter Your Mobile Number" name="mobile">
                </div>
                <div class="mb-3">
                    <input type="checkbox" class="form-check-input" id="check01">
                    <label for="check01" class="form-check-label">I Agrre</label>
                </div>
               
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

        <!--div class="col-md-4 py-5">
           <div class="sidebar">
            <a href="update.php" class="update btn btn-primary text-light">Update</a> || <a href="delete.php" class="delete btn btn-danger text-light">Delete</a>
           </div>
        </div-->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>