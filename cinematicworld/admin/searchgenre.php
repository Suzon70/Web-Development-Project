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
if(isset($_POST['submit'])){
    $search = $_POST['search'];
    $search1  = preg_replace("#[^0-9a-z]#i","",$search);
    $query = "SELECT * FROM genre where category_id like '%$search%' or genre_name like '%$search%' or genre_id like '%$search%' ";
    $run = mysqli_query($con,$query);
    $count = mysqli_num_rows($run);
    if($count == 0){
        echo "<h2> No Genre found </h2>";
    }
    else{
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
}

?>

</table>
</div>
