<?php
include 'db.php';
include "header.php";
include 'ft.php';

if(isset($_POST['submit'])){
    $mv_name = $_POST['mv_name'];
    $meta_des = $_POST['meta_des'];
    $meta_tag = $_POST['meta_tag'];
    $link1 = $_POST['link1'];
    $link2 = $_POST['link2'];
    $lang = $_POST['lang'];
    $director = $_POST['director'];
    $cat_id = $_POST['cat_id'];
    $genre_id = $_POST['genre_id'];
    $mv_des = $_POST['mv_des'];

    $mv_date = date('y-m-d', strtotime($_POST['mv_date']));
    $target = "../thumb/".basename($_FILES['img']['name']);
    $img = $_FILES['img']['name'];

    $query = "INSERT INTO `movie`(`cat_id`, `genre_id`, `mv_name`, `mv_des`, `mv_tag`, `link1`, `link2`, `img`, `date`, `lang`, `director`, `meta_des`) 
    VALUES ($cat_id,$genre_id,'$mv_name','$mv_des','$meta_tag','$link1','$link2','$img','$mv_date','$lang','$director','$meta_des')";

    $run = mysqli_query($con,$query);
    if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){
        //echo "movie uploaded";
        echo "<script> alert('Movie successfully added');window.location.href = 'movielist.php';</script>";
    }
    else{
        echo "<script> alert('Something went wrong..');window.location.href = 'movielist.php';</script>";
    }

}

?>