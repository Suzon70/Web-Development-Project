<?php
session_start();
if(isset($_SESSION['loginsuccessful'])) {
    
}
else {
   echo "<script> alert('You are not Logged in.Please log in to continue.');window.location.href = 'login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin : Cinematic World</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- css style -->
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #370b66;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #370b66;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>

</head>
<body>

<!-- <div><h3 style = "text-align:center;">Admin Panel of CinematicWorld</h3></div> -->

<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> Hello, <?php echo $_SESSION['user']; ?> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto" >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="movielist.php">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorylist.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="genrelist.php">Genre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registerAdmin.php">Register Admin</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-danger" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div>
<div class="sidebar">
  <a class="active" href="index.php">Home</a>
  <a href="adminlist.php">Admin List</a>
  <a href="contact.php">Request List</a>

</div>
</div>





