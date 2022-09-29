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
      <th scope="col">#</th>
      <th scope="col">Category ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">No of Post</th>
      <th scope="col">CURD</th>
      <th scope="col">View Post</th>
    </tr>
  </thead>


<?php
if(isset($_POST['submit'])){
    $search = $_POST['search'];
    $search1  = preg_replace("#[^0-9a-z]#i","",$search);
    $query = "SELECT * FROM category where category_id like '%$search%' or category_name like '%$search%' or genre_id like '%$search%' ";
    $run = mysqli_query($con,$query);
    $count = mysqli_num_rows($run);
    if($count == 0){
        echo "<h2> No Category found </h2>";
    }
    else{
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
}

?>

</table>
</div>
