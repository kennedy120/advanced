<?php

require "security.php";

if (isset($_POST["title"])) {
    extract($_POST);
    /*$conn = mysqli_connect("localhost", "root", "", "tasks");*/
    require 'db.php';
    $id=$_SESSION["info"] ["id"];

    $sql = "INSERT INTO `items`(`id`, `title`, `status`, `date`,`user_id`) VALUES 
                          (NULL ,'$title','$status','$date', '$id')";
    if(!empty($title) and !empty($status)){
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $message = "$title Added successfully.";
    }

    unset($_POST);

}
?>
<!--always remember to define your variables ie ($,{}) otherwise it gives an error-->


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Items</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?Php
require 'navbar.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <h3 class="text-info">Add Item</h3>
            <p class="text-success">
                <?Php
                if (isset($message))
                {
                    echo $message;
                }
                ?>

            </p>

            <form action="items.php" method="post">
                <div class="form-group">
                    <input type="text" name="title" required class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <input type="date" name="date" class="form-control" placeholder="Date">
                </div>
                    <select name="status" class="form-control">
                        <option value="complete">Complete</option>
                        <option value="incomplete">Incomplete</option>
                    </select>
                        <br>
                <button type="submit" name="submit" class="btn btn-primary btn btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<!--//tasks.php== show all the tasks info-->