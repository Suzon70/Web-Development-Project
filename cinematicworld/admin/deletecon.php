<?php
include 'db.php';
include "header.php";
include 'ft.php';

if(isset($_GET['id'])){

$id = $_GET['id'];
$query = "DELETE FROM `contactus` WHERE id =$id";

$run = mysqli_query($con, $query);

if($run){
    echo "<script> alert('Request successfully deleted.');window.location.href = 'contact.php';</script>";
}
else {
    echo "<script> alert('Something went wrong..');window.location.href = 'contact.php';</script>";
}

}
else{
    header('location:contact.php');
}

?>