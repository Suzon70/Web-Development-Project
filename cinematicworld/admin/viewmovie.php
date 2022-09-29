<?php
include 'db.php';
include "header.php";
include 'ft.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM `movie` where id =$id";
    $run = mysqli_query($con,$query);

    if($run){
        while($row = mysqli_fetch_assoc($run)){

?>

<div class = "content">
    <div class = "row">
        <div class = "col">
            <div>
            <?php  echo"<img height='250px' width='200px' src='../thumb/".$row['img']."'>"; ?>
            </div>
        </div>
        <div class = "col" style = "margin-top:20px;">
            <h3 style = "text-align:center;"><?php echo $row['mv_name']; ?></h3>
            <p style = "text-align:left;"><?php echo $row['mv_des'] ;?></p>
            <br><br>
            <div >
                <pre><?php  echo "<b>Director:</b>".$row['director']; ?></pre>
                <pre><?php  echo "<b>Language:</b>".$row['lang']; ?></pre>
                <pre><?php  echo "<b>Release date:</b>".$row['date']; ?></pre>
            </div>
        </div>
    </div>
    <br>
    <div>
        <div>
            <a class ="btn btn-info" href="<?php echo $row['link1'] ?>">Download link1</a>
            <a class ="btn btn-success" href="<?php echo $row['link2'] ?>">Download link2</a>
        </div>
        <br>
        <br>
        <p><?php  echo $row['meta_des']; ?></p>
        <div class = "jumbotron">
        <?php  echo $row['mv_tag']; ?>
        </div>
    </div>
</div>

<?php

        }
    }
}

?>