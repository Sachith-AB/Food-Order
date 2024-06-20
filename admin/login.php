<?php include('../config/constant.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h2 class="text-center">Login</h2>
        <br><br>

        <?php
            if(isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?><br>

        <form action="" method="post" class="">
            <input type="text" placeholder="Username" name="username"><br>
            <input type="password" placeholder="Password" name="password"><br><br>
            <input type="submit" name="submit" value="login" class="edit-btn"><br>
        </form><br><br>

        <p>Created By- <a href="https://github.com/Sachith-AB">Sachith Abeywardhana</a></p>
    </div>
</body>
</html>

<?php 
    //check whether submit button is clicked or not
    if(isset($_POST["submit"])){
        //process for login
        //get data from form
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        //sql check whether the username and password exists or not
        $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //execute query
        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);
        if($count == 1){
            $_SESSION['login']="<div class='success'>Login Successfull</div>";
            header("location:".SITEURL."admin/");
        }else{
            $_SESSION['login']="<div class='error'>Login Failed</div>";
            header("location:".SITEURL."admin/login.php");
        }
    }
?>