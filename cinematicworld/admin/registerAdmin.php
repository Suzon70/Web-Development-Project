<?php
//session_start();
include 'header.php';
include 'ft.php';
include 'db.php';

?>


<div class = "content">
    <div class = "head" style = "text-align: center; padding: 10px,0px,10px,0px">
        <h1>Register Admin for Cinematic World!</h1>
    </div>

<form action = "registerAdmin.php" method = "post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name = "uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name ="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
</form>

</div>

<?php 
if(isset($_POST['submit'])){
  $uname = $_POST['uname'];
  $pwd = $_POST['pwd'];
  $hash = password_hash("$pwd",PASSWORD_BCRYPT);
  

 // $dec = password_verify($pwd, $hash);

  $query = "INSERT INTO `admin`(`uname`, `pwd`) VALUES ('$uname','$hash')";
  $run = mysqli_query($con,$query);
  if($run){
    echo "<script> alert('Admin added successfully.'); window.location.href = 'adminlist.php'; </script>";
  }
  else{
    echo "<script> alert('Something went wrong.'); window.location.href = 'adminlist.php'; </script>";
  }
}


?>