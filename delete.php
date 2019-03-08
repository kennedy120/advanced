<?php
if (isset($GET["id"]))
{
    /*$conn=mysqli_connect("localhost","root","","tasks");*/
    require 'db.php';
    extract($_GET);
    $sql = "delete from items where id=$id";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));

}
header("location:tasks.php");