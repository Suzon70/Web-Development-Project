<?php
include 'header.php';
include 'ft.php';
include 'db.php';

?>

<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $catname = $_GET['catname'];
    $fk = $_GET['forkey'];
    if(isset($_POST['submit'])){
        $cat_name = $_POST['catname'];
        $forkey = $_POST['forkey'];

        $query = "UPDATE `category` SET `category_id`= $forkey,`category_name`='$cat_name' WHERE id =$id";
        $run = mysqli_query($con, $query);

        if($run){
            echo "<script>alert('Category successfully updated...');window.location.href='categorylist.php'; </script>";
        }
        else{
            echo "<script>alert('Something went wrong!');window.location.href='categorylist.php'; </script>";
        }
    }

}else{
    header("location: categorylist.php");
}

?>


<!-- form -->
<div class = "content" >
    <div class = "head" style ="text-align:center; padding: 10px,0px,10px,0px " >
        <h2 >Edit Category</h2>
        <hr>
        <form action="#" method ="post" >
        <div class="form-row">
            <div class="col-7">
            <small>Category Name</small>
            <input type="text" class="form-control" value = "<?php echo $catname; ?>" name = "catname" placeholder="Category Name">
            </div>
            <div class="col">
            <small>Category ID</small>
            <input type="text" class="form-control" value = "<?php echo $fk; ?>" name = "forkey"  placeholder="Category ID">
            </div>
            <div class="col">
            <small>Primary ID</small>
            <input type="text" class="form-control" value = "<?php echo $id; ?>" name = "id"  placeholder="Primary ID">
            </div>
        </div>
        <br><br>
        <button class="btn btn-primary btn-lg" name = "submit" href="#" role="button">Edit</button>
        </form>

    </div>
</div>

