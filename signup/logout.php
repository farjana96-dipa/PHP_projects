<?php 

session_start();
session_destroy();
if(!isset($_SESSION['username'])){
    header('location:login.php');
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
  
    <div class="row">
        <div class="col-md-12 p-5">
            <div class="alert alert-success" role="alert">
            <h2> <strong class="text-info"> <?php echo $_SESSION['username']; ?> </strong>  are Logged Out.</h2>
            </div>
           <a class="btn btn-primary mt-5 text-light" href="login.php">Log In Here</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>