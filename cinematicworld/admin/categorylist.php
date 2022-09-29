<?php
include 'header.php';
include 'ft.php';
include 'db.php';

?>

<!-- ctr+kc to comment and ctr+ku to comment out -->
<!-- <div class="content"> -->

<div class ="content" >
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> Categories on CinematicWorld </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto" >
        <li class="nav-item">
          <a class="btn btn-warning" href="addCategory.php">Add a Category</a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto" >
             <form class="form-inline" method = "post" action = "searchcategory.php">
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
      <th scope="col">#</th>
      <th scope="col">Category ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">No of Post</th>
      <th scope="col">CURD</th>
      <th scope="col">View Post</th>
    </tr>
  </thead>

<?php

$query = "SELECT * FROM category";
$run = mysqli_query($con, $query);

if($run){
    while($row = mysqli_fetch_assoc($run)){

?>


  <tbody>

    <tr>
      <th scope="row"><?php echo $row['id']; ?> </th>
      <td><?php echo $row['category_id']; ?></td>
      <td><?php echo $row['category_name']; ?></td>
      <?php
      $id = $row['id'];
      $query1 = "SELECT COUNT(*) as totalPost FROM `movie`,`category` where category.id=movie.cat_id and category.id=$id";
      $run1 = mysqli_query($con,$query1);
      if($run1){
          while($row1 = mysqli_fetch_assoc($run1)){
             // echo $row1['totalPost'];
             ?>
                   <td><?php echo $row1['totalPost']; ?></td>
             <?php
             
          }
      }
      ?>

      <td><a href="deleteCategory.php?id=<?php echo $row['id']; ?>" class = "btn btn-danger" >Delete</a> 
       <a href="editCategory.php? id= <?php echo $row['id']; ?> &forkey= <?php echo $row['category_id']; ?> &catname= <?php echo $row['category_name']; ?>" class = "btn btn-outline-secondary" >Edit</a></td>
       <td><a href = "viewpost.php?id=<?php echo$row['id'];?>" class ="btn btn-info">View Posts</a></td>
    </tr>
  </tbody>
  <?php

    }
}
?>
</table>
    
</div>

<!-- </div> -->