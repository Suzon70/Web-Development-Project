<?php

session_start();
include 'ft.php';
include 'db.php';

?>
<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head>

<div class = "container" >
    <div class = "head" style = "text-align: center; padding: 10px,0px,10px,0px">
        <h1>Log in to Cinematic World!</h1>
    </div>

<form action = "login.php" method = "post">
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
    $user = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $query = "select * from admin where uname = '$user'";
    $run  = mysqli_query($con,$query);

    if(mysqli_num_rows($run)>0){
        while($row = mysqli_fetch_assoc($run)){
            if(password_verify($pwd,$row['pwd'])){
              $_SESSION['loginsuccessful'] = 1;
              $_SESSION['user'] = $user;
              //echo "<script> alert('Logged in successfully');window.location.href = 'index.php';</script>";
              header("location: index.php");
            }
        }
        
    }
    else echo "<script> alert('Wrong Email or Password');</script>";
}

?>

