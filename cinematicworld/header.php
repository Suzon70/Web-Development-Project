<?php
include '../db/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cinematicWorld</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">

<!-- new -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid" id ="myTopnav2">
    <a class="navbar-brand" href="index.php"><img src="img/logo4.png" style = "height : 50px; width:auto" alt="CinematicWorld"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="disclaimer.php">Disclaimer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="privacy.php">Privacy Policy</a>
        </li>
     
      </ul>
    </div>
  </div>
</nav>

<!-- contact -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="valicontact.php" method = "post" >
              <input type="text" required name ="name" placeholder = "Enter your name" class = "form-control"><br>
              <input type="text" required name ="email" placeholder = "Enter your email" class = "form-control"><br>
              <input type="text" required name ="msg" placeholder = "Enter your msg" class = "form-control"><br>
              <button name = "submit"  class="btn btn-" style = "background-color:#726297;color: #fff;">Submit </button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- second nav -->

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Category</a>
<?php
$q1 = "SELECT * FROM category";
$run = mysqli_query($con,$q1);
if($run){
  while($row = mysqli_fetch_assoc($run)){
    ?>
<?php
$id = $row['id'];
$enc1 = ($id*12345*54321/967934);
$url = "category.php?id=".urldecode(base64_encode($enc1));
?>

  <a href="<?php echo $url ?>"><?php echo $row['category_name'] ?></a>

  <?php
  }
}

?>

  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<!-- marq -->
<?php
$q2 = "SELECT * FROM movie order by id desc limit 1";
$r2 = mysqli_query($con,$q2);
if($r2){
  while($row2 = mysqli_fetch_assoc($r2)){
    ?>
<!-- encryption -->
<?php
$id2 = $row2['id'];
$enc2 = ($id2*12345*54321/967934);
$url2 = "latestpost.php?id=".urldecode(base64_encode($enc2));
?>

<div>
<marquee style = "background-color:#ccc;" onmouseover= "this.stop();" onmouseout= "this.start();" behavior="" direction=""> <a class ="nav-link" href="<?php echo $url2 ?>">Latest post: <?php echo $row2['mv_name'] ?></a> </marquee>
</div>
<?php
  }
}
?>

<!-- third nav -->
<div class="topnav1" id="myTopnav1">
  <a href="index.php" class="active">Genre</a>
  <?php
$q3 = "SELECT * FROM genre";
$run3 = mysqli_query($con,$q3);
if($run3){
  while($row3 = mysqli_fetch_assoc($run3)){
    ?>
    <?php
$id = $row3['id'];
$enc1 = ($id*12345*54321/967934);
$url = "genre.php?id=".urldecode(base64_encode($enc1));
?>
  <a href="<?php echo $url ?>"><?php echo $row3['genre_name'] ?></a>

  <?php
  }
}

?>

  <a href="javascript:void(0);" class="icon" onclick="myFunction1()">
    <i class="fa fa-bars"></i>
  </a>
</div>


<!-- sidebar -->



    
