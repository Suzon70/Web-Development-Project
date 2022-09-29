<?php
include 'ft.php';

?>

<!-- <?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?> -->

    


<!-- sidebar -->
<div class="sidebar">
  <div class = "container" style = "text-align:center;">
  <form action="search.php" method = "post">
    <input type="text" name ="search" placeholder= "Search movie" class = "form-control" style ="width:70%" >
    <button name = "submit" class = "btn btn-" style="float:right;margin-top: -38px;background-color:#726297;color:#fff;">Submit</button>
  </form>
  </div>
  <div class = "container" id = "lp">
    <div class = "latestpost"> 
        <?php
            $query0 = "SELECT * FROM movie order by id desc limit 5";
            $run0 = mysqli_query($con,$query0);
            if($run0){
              while($row0 = mysqli_fetch_assoc($run0) ){
                ?>
                <ul>
                  <li>
                    <a class ="nav-link"id ="a" href="#"><?php echo $row0['mv_name'] ?></a>
                  </li>
                </ul>
                <?php
              }
            }

        ?>
    </div>

  </div>

  <div class = "ads" style ="text-align:center;margin-left:20px;margin-top:20px;">
<h1>Ads</h1>

<!-- <?php
    if(!isset($_COOKIE[$cookie_name])) {
      echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
      echo "Cookie '" . $cookie_name . "' is set!<br>";
      echo "Value is: " . $_COOKIE[$cookie_name];
    }
?>  -->
  </div>

</div>
