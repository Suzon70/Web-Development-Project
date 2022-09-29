<?php
include 'db.php';
include "header.php";
include 'ft.php';
?>

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $genrename = $_GET['genrename'];
    $catid = $_GET['catid'];
    $genid = $_GET['genid'];

    if(isset($_POST['submit'])){
        $genname = $_POST['genrename'];
        $cat_id = $_POST['cat_id'];
        $genreid = $_POST['genreid'];

        $query = "UPDATE `genre` SET `genre_name`='$genname',`category_id`= $cat_id,`genre_id`= $genreid WHERE id = $id";
        $run = mysqli_query($con, $query);

        if($run){
            echo "<script>alert('Genre successfully updated...');window.location.href='genrelist.php'; </script>";
        }
        else{
            echo "<script>alert('Something went wrong!');window.location.href='genrelist.php'; </script>";
        }
    }
}
else {
    header("location:genrelist.php");
    //echo "not worked";
}

?>


<div class ="content">
    <div class ="head">
        <div class="jumbotron">
            <h1 class="display-4">Edit Genre</h1>
            <p class="lead">Edit genre and also please mention their name</p>
            <hr class="my-4">
            <form action = "#" method = "post" >
            <div class="form-row">
                <div class="col-7">
                <small>Genre Name</small>
                <input type="text" value = <?php echo $genrename; ?> name = "genrename" class="form-control" placeholder="Genre Name">
                </div>
                <div class="col">
                <small>Category ID</small>
                <input type="text" value = <?php echo $catid; ?> name = "cat_id" class="form-control" placeholder="Category ID">
                </div>
                <div class="col">
                <small>Genre ID</small>
                <input type="text" value = <?php echo $genid; ?> name = "genreid" class="form-control" placeholder="Genre ID">
                </div>
            </div>
            <br><br>
            <button class="btn btn-primary btn-lg" name = "submit" href="#" role="button">Edit</button>
            </form>            
        </div>
    </div>
</div>