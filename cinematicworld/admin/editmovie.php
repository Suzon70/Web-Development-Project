<?php
include 'db.php';
include "header.php";
include 'ft.php';
?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM `movie` where id = $id";
    $run = mysqli_query($con,$query);

    if($run){
        while($row = mysqli_fetch_assoc($run)){
?>




<div class = "content">
    <div class = "jumbotron" >
        <!-- form -->
        <form action = "#" method = "post" enctype = "multipart/form-data">
        <div class="form-group">
            <small>Movie Name</small>
            <input type="text" value="<?php echo $row['mv_name'] ?>" class="form-control" name = "mv_name"  placeholder="Enter Movie name">
        </div>
        <div class="form-group">
            <small>Category ID</small>
            <input type="text" value="<?php echo $row['cat_id'] ?>" class="form-control" name = "cat_id"  placeholder="Enter Category ID">
        </div>
        <div class="form-group">
            <small>Genre ID</small>
            <input type="text" value="<?php echo$row['genre_id'] ?>" class="form-control" name = "genre_id"  placeholder="Enter Genre ID">
        </div>
        <div class="form-group">
           <small>Meta description</small> <input type="text" value="<?php echo$row['meta_des'] ?>" class="form-control" name = "meta_des"  placeholder="Enter Meta description">
        </div>
        <div class="form-group">
           <small>Meta tag</small> <input type="text" value="<?php echo$row['mv_tag'] ?>" class="form-control" name = "meta_tag"  placeholder="Enter Meta tags">
        </div>
        <div class="form-group">
           <small>link 1</small> <input type="text" value="<?php echo$row['link1'] ?>" class="form-control" name = "link1"  placeholder="Enter link 1">
        </div>
        <div class="form-group">
           <small>link 2</small> <input type="text" value="<?php echo$row['link2'] ?>" class="form-control" name = "link2"  placeholder="Enter link 2">
        </div>
        <div class="form-group">
           <small>Date</small> <input type="date" value="<?php echo$row['date'] ?>" class="form-control" name = "mv_date"  placeholder="Enter Date">
        </div>
        <div class="form-group">
           <small>Director</small> <input type="text" value="<?php echo$row['director'] ?>" class="form-control" name = "director"  placeholder="Enter Director Name">
        </div>
        <div class="form-group">
           <small>Movie language</small> <input type="text" value="<?php echo$row['lang'] ?>" class="form-control" name = "lang"  placeholder="Enter Movie language">
        </div>
        <div class="form-group">
           <small>Image</small> <input type="file" class="form-control" name = "img"  placeholder="Thumbnail">
            <input type="hidden" value = "<?php echo $row['img']?>" name= "old_img">
        </div>
        <div class="form-group">
       <small>Movie description</small> <input type="text" value="<?php echo$row['mv_des'] ?>" class="form-control" name = "mv_des"  placeholder="Enter Movie description" rows="5">
        </div>
        <button type="submit" name ="submit" class="btn btn-info">Submit</button>
        </form>

    </div>
</div>

<?php



if(isset($_POST['submit'])){
    $mv_name = $_POST['mv_name'];
    $meta_des = $_POST['meta_des'];
    $meta_tag = $_POST['meta_tag'];
    $link1 = $_POST['link1'];
    $link2 = $_POST['link2'];
    $lang = $_POST['lang'];
    $director = $_POST['director'];
    $cat_id = $_POST['cat_id'];
    $genre_id = $_POST['genre_id'];
    $mv_des = $_POST['mv_des'];

    $mv_date = date('y-m-d', strtotime($_POST['mv_date']));
    $target = "../thumb/".basename($_FILES['img']['name']);
    $newimg = $_FILES['img']['name'];
    $old_img= $_POST['old_img'];


    if($newimg != ''){
        $update_filename = $newimg;
        
        if(file_exists("../thumb/".$newimg)){
            $filename = $newimg;
            echo "<script> alert('Image Already Added...');window.location.href = 'editmovie.php';</script>";
        }
        else{
            //$update_filename = $old_img;
    
            $query1 = "UPDATE `movie` SET `cat_id`=$cat_id,`genre_id`=$genre_id,`mv_name`='$mv_name',`mv_des`='$mv_des',`mv_tag`='$meta_tag',
            `link1`='$link1',`link2`='$link2',`img`='$update_filename',`date`='$mv_date',`lang`='$lang',`director`='$director',`meta_des`='$meta_des' WHERE id = $id";
            $qr = mysqli_query($con,$query1);
            if($qr){
                if($newimg != ''){
                    if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){
                        //echo "movie uploaded";
                        echo "<script> alert('Movie successfully Updated.');window.location.href = 'movielist.php';</script>";
                    }
                    else{
                        echo "<script> alert('Something went wrong..');window.location.href = 'editmovie.php';</script>";
                    }
                }
            }
    
        }
    }
    else{
        $update_filename = $old_img;

        $query1 = "UPDATE `movie` SET `cat_id`=$cat_id,`genre_id`=$genre_id,`mv_name`='$mv_name',`mv_des`='$mv_des',`mv_tag`='$meta_tag',
        `link1`='$link1',`link2`='$link2',`img`='$update_filename',`date`='$mv_date',`lang`='$lang',`director`='$director',`meta_des`='$meta_des' WHERE id = $id";
        $qr = mysqli_query($con,$query1);
        if($qr){
            
                
                    //echo "movie uploaded";
                    echo "<script> alert('Movie successfully Updated.');window.location.href = 'movielist.php';</script>";
        }

                else{
                    echo "<script> alert('Something went wrong..');window.location.href = 'editmovie.php';</script>";
                }
            
        
        }


}





?>


<?php
        }
    }

}
else{
    header("location:movielist.php");
}

?>