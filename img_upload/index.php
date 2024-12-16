<?php
    require_once('config.php');
    require_once('operations.php');

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $img = $_FILES['file'];
        echo $name . "<br>";
        echo $email . "<br>";
        print_r($img);

        $img_name = $img['name'];
        $img_type = $img['type'];
        $img_tmp = $img['tmp_name'];

        $img_separate = explode('.',$img_name);
        $img_extension = strtolower(end($img_separate));
        echo "<br> Image Name : ". $img_separate[0] . "<br> Image Extension : " . end($img_separate);
        $ex = array('jpg','jpeg','png','webp','gif');
        if(in_array($img_extension,$ex)){
            $upload_img = 'images/'. $img_name;
            move_uploaded_file($img_tmp, $upload_img);

            $sql = "INSERT INTO img_upload(name,email,image) VALUES('$name','$email','$upload_img')";
            $res = mysqli_query($con,$sql);
            if($res){
                echo "Data inserted Successfully!!";
            }else{
                echo "Data insertion failed!";
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
    <title>Image Upload Projects</title>
</head>
<body>


         <div class="container">
            <div class="row py-5">
                <div class="col-md-12">
                    <h2 class="text-center">Image Upload Projects</h2>
                    <form action="display.php" method="post" class="form w-50 mx-auto" enctype="multipart/form-data">
                        <?php input_field("text","Enter Your Name","","name"); ?>
                        <?php input_field("text","Enter Your Email","","email"); ?>
                        <?php input_field("file","","","file"); ?>
                        <button type="submit" class="btn btn-primary text-center" name="submit">Submit</button>
                    </form>
                </div>
            </div>
         </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>