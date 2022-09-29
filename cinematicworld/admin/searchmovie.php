<?php
include 'db.php';
include "header.php";
include 'ft.php';
?>

<?php
$search2 = $_POST['search'];

?>
<div class = "content">
<h1 style = "text-align:center;" >Search result of "<?php echo $search2;?>"</h1>
<div class = "row">

<?php
if(isset($_POST['submit'])){
    $search = $_POST['search'];
    $search1  = preg_replace("#[^0-9a-z]#i","",$search);
    $query = "SELECT * FROM movie where mv_name like '%$search%' or mv_tag like '%$search%' or lang like '%$search%' or director like '%$search%' or date like '%$search%' ";
    $run = mysqli_query($con,$query);
    $count = mysqli_num_rows($run);
    if($count == 0){
        echo "<h2> No movie found </h2>";
    }
    else{
        while($row = mysqli_fetch_assoc($run)){
            ?>

    <div class="col-md-2">
        <div class="card" style="width: 200px; text-align:center">
            <p> <?php echo $row['id'] ;?></p>
            <?php  echo"<img height='250px' width='200px' src='../thumb/".$row['img']."'>"; ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['mv_name'] ?></h5>
                <p class="card-text"><?php echo $row['meta_des'] ?></p>
                <a href="viewmovie.php?id=<?php echo $row['id']; ?>" class="btn btn-success">View details</a>
                <br><br>
                <a href="deletemovie.php?id=<?php echo $row['id'] ;?>" class="btn btn-danger">Delete</a>
                <a href="editmovie.php?id=<?php echo $row['id'] ; ?>" class="btn btn-info">Edit</a>
            </div>
        </div>


    </div>





            <?php
        }
    }
}

?>

</div>
</div>