<?php
include 'db.php';
include "header.php";
include 'ft.php';
//session_start();
if(isset($_SESSION['loginsuccessful'])) {
    
}
else {
   // header('location: login.php');
   echo "<script> alert('You are not Logged in.Please log in to continue.');window.location.href = 'login.php';</script>";
}

?>

<br><br>
<div class="content">
<div class="row">
<!-- movie -->
  <div class="col-sm-6">
    <div class="card" style = "background-color:#396630;border-radius:15px;color:#fff;border:0px;">
      <div class="card-body text-center">
        <h5 class="card-title">Total No. of Movie</h5>
        <p class="card-text">
        <?php
          $query = "SELECT COUNT(*) as total_movie FROM movie";
          $run = mysqli_query($con,$query);
          if($run){
            while($row = mysqli_fetch_assoc($run)){
              echo $row['total_movie'];
            }
          }

          ?>
        </p>
      </div>
    </div>
  </div>
<!-- category -->
<div class="col-sm-6">
    <div class="card" style = "background-color:#226c8f;border-radius:15px;color:#fff;border:0px;">
      <div class="card-body text-center">
        <h5 class="card-title">Total No. of Category</h5>
        <p class="card-text">
        <?php
          $query = "SELECT COUNT(*) as total_category FROM category";
          $run = mysqli_query($con,$query);
          if($run){
            while($row = mysqli_fetch_assoc($run)){
              echo $row['total_category'];
            }
          }

          ?>
        </p>
      </div>
    </div>
  </div>
<br>
  <!-- admin -->
  <div class="col-sm-6">
    <div class="card" style = "background-color:#612da8;border-radius:15px;color:#fff;border:0px; ">
      <div class="card-body text-center">
        <h5 class="card-title">Total No. of Admin </h5>
        <p class="card-text">
        <?php
          $query = "SELECT COUNT(*) as total_admin FROM `admin`";
          $run = mysqli_query($con,$query);
          if($run){
            while($row = mysqli_fetch_assoc($run)){
              echo $row['total_admin'];
            }
          }

          ?>
        </p>
      </div>
    </div>
  </div>

  <!-- genre -->
  <div class="col-sm-6">
    <div class="card" style = "background-color:#b35f24;border-radius:15px;color:#fff;border:0px;">
      <div class="card-body text-center">
        <h5 class="card-title">Total No. of Genre </h5>
        <p class="card-text">
        <?php
          $query = "SELECT COUNT(*) as total_genre FROM genre";
          $run = mysqli_query($con,$query);
          if($run){
            while($row = mysqli_fetch_assoc($run)){
              echo $row['total_genre'];
            }
          }

          ?>
        </p>
      </div>
    </div>
  </div>
</div>
<hr>
<br>
<div class = "sbtn text-center" id="hbtn" >
<button class = "btn btn-info" onclick ="first()" style = "width: 150px;">Category &#8650;</button>
</div>
<br>

<!-- category button -->
<div class = "show" id = "show" style = "display: none;">
<div><h3 style = "text-align:center;">Category</h3></div>
<div class="row">

<?php
$query1 = "SELECT * FROM category"; 
$run1 = mysqli_query($con,$query1);
if($run1){
  while($row1 =  mysqli_fetch_assoc($run1)){
    ?>

  <div class="col-sm-6">

    <div class="card text-center">
      <div class="card-body" style = "background-color:#751e5a;border-radius:15px;color:#fff;border:0px;">
        <h5 class="card-title">Total No. of Post in <?php  echo $row1['category_name'];?></h5>
        <?php
            $id = $row1['id'];
            $query2 = "SELECT COUNT(*) as totalPost FROM `movie`,`category` where category.id=movie.cat_id and category.id=$id";
            $run2 = mysqli_query($con,$query2);
            if($run2){
                while($row2 = mysqli_fetch_assoc($run2)){
                  // echo $row1['totalPost'];
                  ?>
                    <p class="card-text"><?php echo $row2['totalPost']; ?></p>
             <?php
             
          }
      }
      ?>

        
      </div>
    </div>
  </div>

  <?php
  }
}
?>
</div>
</div>
<hr>
<br>
<!-- genre button -->
<div class = "gbtn text-center" id="hbtn2" >
<button class = "btn btn-info" onclick ="first1()" style = "width: 150px;">Genre &#8650;</button>
</div>
<br>
<div class = "genshow" id = "genshow" style = "display:none">
<hr>
<div><h3 style = "text-align:center;">Genre</h3></div>
<div class="row">

<?php
$query3 = "SELECT * FROM genre"; 
$run3 = mysqli_query($con,$query3);
if($run3){
  while($row3 =  mysqli_fetch_assoc($run3)){
    ?>

  <div class="col-sm-6">

    <div class="card text-center">
      <div class="card-body" style = "background-color:#9c8d1e;border-radius:15px;color:#fff;border:0px;">  <!-- background-color -->
        <h5 class="card-title">Total Count in <?php  echo $row3['genre_name'];?></h5>
        <?php
            $id = $row3['id'];
            $query4 = "SELECT COUNT(*) as total_cat FROM `category`,`genre` where genre.id = category.genre_id and genre.id = $id";
            $run4 = mysqli_query($con,$query4);
            if($run4){
                while($row4 = mysqli_fetch_assoc($run4)){
                  // echo $row1['totalPost'];
                  ?>
                    <p class="card-text">No. of category <?php echo $row4['total_cat']; ?></p>
             <?php
             
          }
      }
      ?>


<?php
            $id = $row3['id'];
            $query5 = "SELECT COUNT(*) as total_post from movie,genre where genre.id=movie.genre_id and genre.id=$id";
            $run5 = mysqli_query($con,$query5);
            if($run5){
                while($row5 = mysqli_fetch_assoc($run5)){
                  // echo $row1['totalPost'];
                  ?>
                    <p class="card-text">No. of post <?php echo $row5['total_post']; ?></p>
             <?php
             
          }
      }
      ?>

        
      </div>
    </div>
  </div>

  <?php
  }
}
?>
</div>
</div>

</div>

</div>



<!-- js show and hide -->

<script>
  // category
  function first(show,hide){
    document.getElementById('show').style.display = "block";
    document.getElementById('hbtn').style.display = "none";
  }
  //genre
  function first1(show,hide){
    document.getElementById('genshow').style.display = "block";
    document.getElementById('hbtn2').style.display = "none";
  }

</script>

<!-- js end -->
