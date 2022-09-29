<?php
include 'header.php';
include 'ft.php';
include 'db.php';

?>

<div class = "content">
   <center> <h3>Contact list</h3></center>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>
      <th scope="col">CURD</th>
    </tr>
  </thead>
  <tbody>
<?php
$query = "SELECT * FROM contactus";
$run = mysqli_query($con,$query);
if($run){
    while($row = mysqli_fetch_assoc($run)){
        ?>


    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['uname']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['msg']; ?></td>
      <td><a class = "btn btn-danger"  href="deletecon.php?id=<?php echo $row['id'] ?>">Delete</a></td>
    </tr>
    <?php
    }
}

?>
  </tbody>
</table>
</div>