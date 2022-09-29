<?php
include 'header.php';
include 'ft.php';

?>
<style>
    html{
        scroll-behavior:smooth;
    }
</style>

<?php

if(isset($_GET['id'])){
        $id = $_GET['id'];
        foreach ($_GET as $key => $id){
        $data = $_GET[$key] = base64_decode(urldecode($id));
        $dec1 = round((($data*43534)/3445)/3454);
    
        $query = "SELECT * FROM movie where id=$dec1";
        $run = mysqli_query($con,$query);
        if(mysqli_num_rows($run)>0){
            while($row = mysqli_fetch_assoc($run)){
                ?>

                <div class = "container text-center">
                    <div class = "img">
                        <img src="thumb/<?php echo $row['img']; ?>" height= "400px" width = "300px" style = "max-width:100%" >
                    </div><br>
                    <div id ="btn">
                    <a href="#download" onclick = "myfun()" class = "btn btn-" style ="background-color:#726297;color:#fff">Download</a>
                    </div>
                    <br><br>
                    <div class ="container">
                        <h2><?php echo $row['mv_name'] ?></h2>
                        <p><?php echo $row['mv_tag'] ?></p>
                        <pre><?php  echo "<b>Director:</b>".$row['director']; ?></pre>
                        <pre><?php  echo "<b>Language:</b>".$row['lang']; ?></pre>
                        <pre><?php  echo "<b>Release date:</b>".$row['date']; ?></pre>
                    </div>
                    <div class = "jumbotron">
                    <p><?php echo $row['mv_des'] ?></p>
                    </div>

                    <div id = "download" style = "display:none; margin-bottom:50px;">
                    <a href="<?php echo $row['link1'];?>"  class = "btn btn-" style ="background-color:#726297;color:#fff">Download 1</a>
                    <a href="<?php echo $row['link2'];?>"  class = "btn btn-" style ="background-color:#726297;color:#fff">Download 2</a>

                    </div>

                </div>


<script>
    function myfun(show,hide){
        document.getElementById('download').style.display = "block";
        document.getElementById('btn').style.display = "none";
    }
</script>

 <?php
            }
        }
    }
}
else{
    // header('location:index.php');
    echo "<script>window.location.href = 'index.php';</script>";
}

?>