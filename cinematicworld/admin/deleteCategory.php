<?php
include 'db.php';
include "header.php";
include 'ft.php';

$id = $_GET['id'];
$query = "DELETE FROM `category` WHERE id =$id";

$run = mysqli_query($con, $query);

if($run){
    echo "<script> alert('Category successfully deleted.');window.location.href = 'categorylist.php';</script>";
}
else {
    echo "<script> alert('Something went wrong..');window.location.href = 'categorylist.php';</script>";
}

?>



