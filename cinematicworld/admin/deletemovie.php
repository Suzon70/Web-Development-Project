<?php
include 'db.php';
include "header.php";
include 'ft.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM `movie` where id = $id";
    $run = mysqli_query($con,$query);
    
    if($run){
        echo "<script> alert('Movie successfully deleted.');window.location.href = 'movielist.php';</script>";
    }
    else {
        echo "<script> alert('Something went wrong..');window.location.href = 'movielist.php';</script>";
    }
}
else {
    header("location:movielist.php");
}

?>