<?php
include 'header.php';
include 'ft.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $msg = $_POST['msg'];

    $query = "INSERT INTO `contactus`(`uname`, `email`, `msg`) VALUES ('$name','$mail','$msg')";
    $run = mysqli_query($con,$query);

    if($run){
        echo " <script> Swal.fire(
            'Request submitted',
            'We will review your feedback asap.',
            'success'
          ) ; // window.location.href ='index.php';
          </script>";
    }
    else {
        echo "not submitted";
    }

}


?>