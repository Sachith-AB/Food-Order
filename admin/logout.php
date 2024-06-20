<?php
    include("../config/constant.php");
    // destroy session 
    session_destroy();  // destroy user session
    //redirect to logon page
    header("location:".SITEURL."admin/login.php");
?>