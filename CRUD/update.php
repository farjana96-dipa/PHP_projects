<?php
    include 'config.php';
   
    

    //$user = false;
    //$success = false;

  
        $id = $_GET['updateid'];
    

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];
        $mobile = $_POST['mobile'];

        if ($pass !== $cpass) {
            echo "<div class='alert alert-danger'>Passwords do not match!</div>";
            exit;
        }

        $update = "UPDATE signup_table SET  username='$username', email = '$email', 
            password = '$pass', cpassword = '$cpass' , mobile = '$mobile' WHERE id = '$id' ";
        $query = mysqli_query($connect,$update);
        if($query){
            echo "
                <div class='container pt-3'>
                    <div class='alert alert-info'><h3>Data is Updated!!</h3></div>
                </div>
            ";

            header('location:display.php');
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

         

<div class="container py-3 crform">
    <div class="row">
        <div class="col-md-12 p-5 main_form">
           <div class="title">
           <h2 class="">Update Your Information</h2>
           </div>
          
            <form action="" class="form" method="post">
            <?php
                        if(isset($_GET['updateid'])){
                           
                            $sql = " SELECT *FROM signup_table WHERE id = '$id' ";
                            $res = mysqli_query($connect, $sql);
                            if($res){
                                $row = mysqli_fetch_assoc($res);
                                $user = $row['username'];
                                $email = $row['email'];
                                $pass = $row['password'];
                                $mobile = $row['mobile'];
                                
                            }
                        }
                           
                        
                    ?>
                <div class="mb-3">
                    <label for="username" class="form-label">UserName</label>
                    <input type="text" class="form-control" value="<?php echo $user; ?>" name="username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" value="<?php echo $pass; ?>" name="password">
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" value="<?php echo $pass; ?>" name="cpassword">
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" value="<?php echo $mobile; ?>" name="mobile">
                </div>
                <div class="mb-3">
                    <input type="checkbox" class="form-check-input" id="check01">
                    <label for="check01" class="form-check-label">I Agrre</label>
                </div>
               
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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