<?php
    include 'config.php';

    //$user = false;
    //$success = false;

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];


        
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
            <a href="index.php" class="btn btn-primary">ADD USER</a>
                <table class="table table-striped table-info my-5">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $select = " SELECT *FROM signup_table";
                        $query = mysqli_query($connect, $select);
                        if($query){
                           while($row = mysqli_fetch_assoc($query)){
                             $id = $row['id'];
                             $user = $row['username'];
                             $email = $row['email'];
                             $mobile = $row['mobile'];
                           
                        
                    ?>
                        <tr>
                            <th scope="row"><?php echo $id; ?></th>
                            <td><?php echo $user; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $mobile; ?></td>
                            <td>
                                
                            <a href="update.php?updateid=<?php echo $id; ?>" class="btn btn-primary">Update</a> 
                            
                            
                            
                            <a href="delete.php?delid=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>