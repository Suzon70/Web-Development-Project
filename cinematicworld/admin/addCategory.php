<?php 
include 'header.php';
include 'ft.php';
include 'db.php';


?>


<div class ="content">
    <div class ="head">
        <div class="jumbotron">
            <h1 class="display-4">Add a category</h1>
            <p class="lead">Add a category and also please mention their name</p>
            <hr class="my-4">
            <form action = "addCategory.php" method = "post" >
            <div class="form-row">
                <div class="col-7">
                <input type="text" name = "catname" class="form-control" placeholder="Category">
                </div>
                <div class="col">
                <input type="text"  name = "catid" class="form-control" placeholder="Category ID">
                </div>
                <div class="col">
                <input type="text"  name = "genid" class="form-control" placeholder="Genre ID">
                </div>
            </div>
            <br><br>
            <button class="btn btn-primary btn-lg" name = "submit" href="#" role="button">Add category</button>
            </form>
           
                
                
        </div>
    </div>
</div>

<?php 

if(isset($_POST['submit'])){
    $catname = $_POST['catname'];
    $catid = $_POST['catid'];
    $genid = $_POST['genid'];

    $query = "INSERT INTO `category`(`category_id`, `category_name`, `genre_id`) VALUES ($catid,'$catname', $genid)";
    $run = mysqli_query($con, $query);

    if($run){
        echo "<script> alert('Category successfully added');window.location.href = 'categorylist.php';</script>";
    }
    else {
        echo "<script> alert('An unknown error occurred');window.location.href = 'addCategory.php';</script>";
    }
}


?>