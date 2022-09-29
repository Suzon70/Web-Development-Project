<?php
include 'db.php';
include "header.php";
include 'ft.php';
?>


<div class ="content" >
    <div class = "head" style = "text-align: center; padding: 10px,0px,10px,0px" >
        <h1>Admins of CinematicWorld</h1>
    </div>
   <!-- table -->
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">CURD</th>
    </tr>
  </thead>

<?php

$query = "SELECT * FROM `admin`";
$run = mysqli_query($con, $query);

if($run){
    while($row = mysqli_fetch_assoc($run)){

?>


  <tbody>

    <tr>
      <th scope="row"><?php echo $row['id']; ?> </th>
      <td><?php echo $row['uname']; ?></td>
      <td>Password encrypted</td>
      <td><a href="deleteadmin.php?id=<?php echo $row['id']; ?>" class = "btn btn-danger" >Delete</a> 
       <a href="registerAdmin.php"class = "btn btn-success">New Admin</a></td>
    </tr>
  </tbody>
  <?php

    }
}
?>
</table>
    
</div>


</div>