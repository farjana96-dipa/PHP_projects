<?php


include 'config.php';

if(isset($_GET['delid'])){
    $id = $_GET['delid'];

    $sql = " DELETE FROM signup_table WHERE id = '$id' ";

    $res = mysqli_query($connect, $sql);

    if($res){
        echo "<div class='container pt-3'>
                    <div class='alert alert-info'><h3>Data Deleted Successfully!!</h3></div>
              </div>";
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

</body>
</html>