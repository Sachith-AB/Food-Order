<?php 
    //authorization - access control
    //check whether the user is logged in or not
    if(!isset($_SESSION['user'])){
        //user is not looged in 
        //redirect to login page with message
        $_SESSION['no-login-message']="<div class='error '>Please login to access Admin Panel</div>";
        header("location:".SITEURL."admin/login.php");
    }
?>
