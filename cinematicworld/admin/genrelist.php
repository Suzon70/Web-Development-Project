<?php
include 'db.php';
include "header.php";
include 'ft.php';
?>

<div class ="content" >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> Genre on CinematicWorld </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto" >
        <li class="nav-item">
          <a class="btn btn-warning" href="addgenre.php">Add a Genre</a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto" >
             <form class="form-inline" method = "post" action = "searchgenre.php">
             <input class="form-control mr-sm-2" name = "search" type="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" name = "submit" type="submit">Search</button>
             </form>
        </ul>
        </div>
    </div>
    </nav>
    <hr>
   <!-- table -->
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Genre Name</th>
      <th scope="col">Category ID</th>
      <th scope="col">Genre ID</th>
      <th scope="col">No of Category</th>
      <th scope="col">No of Posts </th>
      <th scope="col">CURD</th>


    
    </tr>
  </thead>

<?php

$query = "SELECT * FROM `genre`";
$run = mysqli_query($con, $query);

if($run){
    while($row = mysqli_fetch_assoc($run)){

?>


  <tbody>

    <tr>
      <th scope="row"><?php echo $row['id']; ?> </th>
      <td><?php echo $row['genre_name']; ?></td>
      <td><?php echo $row['category_id']; ?></td>
      <td><?php echo $row['genre_id']; ?></td>
      <?php
        $id = $row['id'];
        $query1 = "SELECT COUNT(*) as total_gen FROM `category`,`genre` where genre.id = category.genre_id and genre.id = $id";
        $run1 = mysqli_query($con,$query1);
        if($run1){
          while($row1 = mysqli_fetch_assoc($run1)){
      ?>   
      <td><?php echo $row1['total_gen']; ?></td>
      <?php
          }
        }
      ?>

<?php

$query2= "SELECT COUNT(*) as total_post from movie,genre where genre.id=movie.genre_id and genre.id=$id";
$run2 = mysqli_query($con,$query2);
if($run2){
  while($row2 = mysqli_fetch_assoc($run2)){
    ?>  

<td><?php echo $row2['total_post'];?></td>

<?php
  }
}

?>

      <td><a href="deletegenre.php?id=<?php echo $row['id']; ?>" class = "btn btn-danger" >Delete</a> 
       <a href="editgenre.php?id=<?php echo $row['id']; ?>&genrename=<?php echo $row ['genre_name']; ?> &catid=<?php echo $row['category_id']; ?>&genid=<?php echo $row['genre_id']; ?>" class = "btn btn-outline-secondary" >Edit</a></td>
    </tr>
  </tbody>
  <?php

    }
}
?>
</table>
    
</div>


</div>