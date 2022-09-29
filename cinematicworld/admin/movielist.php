<?php
include 'db.php';
include "header.php";
include 'ft.php';
?>

<div class = "content">
    <div>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> Movies on CinematicWorld </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto" >
        <li class="nav-item">
          <a class="btn btn-warning" href="addmovie.php">Add a movie</a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto" >
             <form class="form-inline" method = "post" action = "searchmovie.php">
             <input class="form-control mr-sm-2" name = "search" type="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" name = "submit" type="submit">Search</button>
             </form>
        </ul>
        </div>
    </div>
    </nav>
    </div>
    <br>

<div>
<div class="row">
<?php

$query = "SELECT * FROM `movie`";
$run = mysqli_query($con, $query);

if($run){
    while($row = mysqli_fetch_assoc($run)){

?>
    <div class="col-md-3">
    <div class="card" style="width: 200px; text-align:center">
            <p> <?php echo $row['id'] ;?></p>
            <?php  echo"<img height='250px' width='200px' src='../thumb/".$row['img']."'>"; ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['mv_name'] ?></h5>
                <p class="card-text"><?php echo $row['meta_des'] ?></p>
                <a href="viewmovie.php?id=<?php echo $row['id']; ?>" class="btn btn-info">View details</a>
                <br><br>
                <a href="deletemovie.php?id=<?php echo $row['id'] ;?>" class="btn btn-danger">Delete</a>
                <a href="editmovie.php?id=<?php echo $row['id'] ; ?>" class="btn btn-success">Edit</a>
            </div>
        </div>


    </div>

    <?php
                }
            }

        ?>
</div>
</div>
</div>













