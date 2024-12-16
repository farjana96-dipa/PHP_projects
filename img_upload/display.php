<?php
    require_once('config.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Image Upload Projects</title>
</head>
<body>


         <div class="container">
            <div class="row py-5">
            <div class="col-md-12 p-5 main_form w-75 mx-auto">
            <a href="index.php" class="btn btn-primary">ADD USER</a>
                <table class="table table-striped table-info my-5">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                           
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $select = " SELECT *FROM img_upload";
                        $query = mysqli_query($con, $select);
                        if($query){
                           while($row = mysqli_fetch_assoc($query)){
                             $id = $row['id'];
                             $img = $row['image'];
                             $user = $row['name'];
                             $email = $row['email'];
                             
                           
                        
                    ?>
                        <tr>
                            <th scope="row"><?php echo $id; ?></th>
                            <td><img src="<?php echo $img; ?>" alt=""></td>
                            <td><?php echo $user; ?></td>
                            <td><?php echo $email; ?></td>
                            
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