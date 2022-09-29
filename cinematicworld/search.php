<?php
include 'header.php';
include 'ft.php';
include 'sidebar.php';
?>

<div class = "content">
<div class="row">

<?php
// movie search
$flag = 0;

if(isset($_POST['submit'])){
    $input = $_POST['search'];
    $search = preg_replace("#[^0-9a-z]#i","",$input);
    $query = "SELECT * FROM movie where mv_name like '%$search%' or mv_tag like '%$search%' or lang like '%$search%' or director like '%$search%' or date like '%$search%' ";
    $run = mysqli_query($con,$query);
    $count = mysqli_num_rows($run);
    if($count > 0){
        while($row= mysqli_fetch_assoc($run)){
?>
    <div class="col">
    <div class="card" style="width: 200px; text-align:center">
            <?php  echo"<img height='250px' width='200px' src='thumb/".$row['img']."'>"; ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['mv_name'] ?></h5>
                <p class="card-text"><?php echo $row['meta_des'] ?></p>
                <?php
                    $id = $row['id'];
                    $cal = ($id*3454*3445)/43534;
                    $url = "download.php?id=".urlencode(base64_encode($cal));

                ?>
                <a href="<?php echo$url; ?>" class="btn btn-info" style= "background-color:#726297;color:#fff">Download</a>
            </div>
        </div>


    </div>

<?php
        }
        $flag = 1;
    }
}
else{
    echo "<h1>No movie searched.</h1>";
}



//category search

if(isset($_POST['submit'])){
    $input1 = $_POST['search'];
    $search1 = preg_replace("#[^0-9a-z]#i","",$input1);
    $query1 = "SELECT * FROM category where category_name like '%$search1%' ";
    $run1 = mysqli_query($con,$query1);
    $count1 = mysqli_num_rows($run1);
    if($count1 > 0){
        while($row1= mysqli_fetch_assoc($run1)){
            ?>
  <!-- card -->
  <div class="card" style="width: 18rem; margin-top:20px; text-align:center; background-color:#ccc">
  <div class="card-body">
    <h5 class="card-title"><?php  echo $row1['category_name'] ?></h5>
    <!-- encryption -->
    <?php
        $id = $row1['id'];
        $cal = ($id*3454*3445)/43534;
        $url = "postbycat.php?id=".urlencode(base64_encode($cal));
    ?>
    <a href="<?php echo$url; ?>" class="card-link">View list</a>
  </div>
</div>

<?php
        }
        $flag = 1;
    }

}

//genre

if(isset($_POST['submit'])){
    $input2 = $_POST['search'];
    $search2 = preg_replace("#[^0-9a-z]#i","",$input2);
    $query2 = "SELECT * FROM genre where genre_name like '%$search2%' ";
    $run2 = mysqli_query($con,$query2);
    $count2 = mysqli_num_rows($run2);
    if($count2 > 0){
        while($row2= mysqli_fetch_assoc($run2)){
        ?>
         <!-- card -->
        <div class="card" style="width: 18rem; margin-top:20px; text-align:center; background-color:#ccc">
        <div class="card-body">
            <h5 class="card-title"><?php  echo $row2['genre_name'] ?></h5>
                <!-- encryption -->
            <?php
                $id2 = $row2['id'];
                $cal2 = ($id2*3454*3445)/43534;
                $url2 = "postbygen.php?id=".urlencode(base64_encode($cal2));
            ?>
            <a href="<?php echo$url2; ?>" class="card-link">View list</a>
        </div>
        </div>

    <?php
        }
        $flag = 1;
    }

}

if($flag == 0){
        echo "<h1 style ='text-align:center;'>No result found. </h1>";
}




?>

</div>
</div>