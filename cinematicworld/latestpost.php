<?php
include 'header.php';
include 'ft.php';
include 'sidebar.php';
?>

    
<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    foreach ($_GET as $key => $id){
    $data = $_GET[$key] = base64_decode(urldecode($id));
    $dec1 = round((($data*967934)/54321)/12345);
    //echo $dec1;
    $query = "SELECT * FROM movie where id=$dec1";
    $run = mysqli_query($con,$query);
    if($run){
        while($row = mysqli_fetch_assoc($run)){
?>
    <!-- card -->
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
    }

    }

}
else{
   echo "<script>window.location.href='index.php';</script>";
}

?>