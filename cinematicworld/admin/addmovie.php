<?php
include 'db.php';
include "header.php";
include 'ft.php';
?>

<div class = "content">
    <div class = "jumbotron" >
        <!-- form -->
        <form action = "valinewpost.php" method = "post" enctype = "multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name = "mv_name"  placeholder="Enter Movie name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name = "cat_id"  placeholder="Enter Category ID">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name = "genre_id"  placeholder="Enter Genre ID">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name = "meta_des"  placeholder="Enter Meta description">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name = "meta_tag"  placeholder="Enter Meta tags">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name = "link1"  placeholder="Enter link 1">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name = "link2"  placeholder="Enter link 2">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name = "mv_date"  placeholder="Enter Date">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name = "director"  placeholder="Enter Director Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name = "lang"  placeholder="Enter Movie language">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name = "img"  placeholder="Thumbnail">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" name = "mv_des"  placeholder="Enter Movie description" rows="5"></textarea>
        </div>
        <button type="submit" name ="submit" class="btn btn-info">Submit</button>
        </form>

    </div>
</div>