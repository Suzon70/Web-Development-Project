<?php
include 'db.php';
include "header.php";
include 'ft.php';
?>


<div class ="content">
    <div class ="head">
        <div class="jumbotron">
            <h1 class="display-4">Add a genre</h1>
            <p class="lead">Add a genre and also please mention their name</p>
            <hr class="my-4">
            <form action = "addgenre.php" method = "post" >
            <div class="form-row">
                <div class="col-7">
                <input type="text" name = "genrename" class="form-control" placeholder="Genre Name">
                </div>
                <div class="col">
                <input type="text"  name = "cat_id" class="form-control" placeholder="Category ID">
                </div>
                <div class="col">
                <input type="text"  name = "genreid" class="form-control" placeholder="Genre ID">
                </div>
            </div>
            <br><br>
            <button class="btn btn-primary btn-lg" name = "submit" href="#" role="button">Add Genre</button>
            </form>
           
                
                
        </div>
    </div>
</div>

<?php 

if(isset($_POST['submit'])){
    $genname = $_POST['genrename'];
    $catid = $_POST['cat_id'];
    $genreid = $_POST['genreid'];

    $query = "INSERT INTO `genre`( `genre_name`, `category_id`, `genre_id`) VALUES ('$genname',$catid,$genreid)";
    $run = mysqli_query($con,$query);

    if($run){
        echo "<script> alert('Genre successfully added');window.location.href = 'genrelist.php';</script>";
    }
    else {
        echo "<script> alert('An unknown error occurred');window.location.href = 'addgenre.php';</script>";
    }
}

?>