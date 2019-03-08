<?php
require "security.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?Php
require 'navbar.php';
?>
<!--table creation begins here-->
<div class="container">
    <table class="table table-dark" id="items">
        <thead>
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>DATE</th>
            <th>STATUS</th>
            <th>Action</th><!--remember action always-->
        </tr>
        </thead>
        <tbody>
        <!-- <tr>
                <td>1</td>
                <td>Denu</td>
                <td>denu@gmail.com</td>
                <td>1999/2/2</td>
                <td>Male</td>
                <td>Computer</td>
                <td>ew3648</td>
                <td>123344 Mbs</td>
                <td>100000</td>
            </tr>-->
        <!--php code begins here-->
        <?php
        /*connecting with database*/
        /*$conn=mysqli_connect("localhost","root","","tasks");*/
        require 'db.php';
        $id=$_SESSION["info"]["id"];
        $sql=" SELECT * FROM items WHERE user_id='$id'";
        $results= mysqli_query($conn,$sql);
        while($row= mysqli_fetch_assoc($results))
        {
            extract($row);
            echo "<tr>
             <td> $id</td>
             <td> $title</td>
             <td> $date</td>
             <td> $status</td>
             <td><a class='btn btn-danger btn-sm' href='delete.php?id=$id'>delete</a></td>
            </tr>";
        }

        ?>
<!--php code ends here-->
        </tbody>
    </table>
</div>
<!--get this from data table after browsing with google search in java-->
<script>$(document).ready(function() {
        $('#items').DataTable();
    } );
</script>
<!--end of script-->
</body>
</html>