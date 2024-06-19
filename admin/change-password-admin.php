<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h2>Change Admin Password</h2><br><br>
        <?php 
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            
        ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Current password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="current password">
                    </td>
                </tr>

                <tr>
                    <td>New password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="new password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="confirm" class="edit-btn">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php 
    if(isset($_POST['submit'])) {
        //echo "clicked";
        //get the data from form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        //check wether the user e=with current ID and current password exits or not
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
        //execute query
        $res = mysqli_query($conn, $sql);

        if($res == true){
            $count = mysqli_num_rows($res);
            if($count == 1){
                //user exists and password can be changed
                //echo"user found"
                //check whether new password and confirm password match or not
                if($new_password == $confirm_password){
                    //update password
                    //echo"pas match"
                    $sql2 = "UPDATE tbl_admin SET password='$new_password'  WHERE id=$id";
                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);
                    //check query correct or not
                    if($res2 == true){
                        //display success message
                        $_SESSION['change-passowrd'] = "<div class='success'>Password Updated</div>";
                        header("location:".SITEURL."admin/manage-admin.php");
                    }else{
                        //display error message
                        $_SESSION['change-password'] = "<div class='error'>Update Password Failed</div>";
                        header("location:".SITEURL."admin/manage-admin.php");
                    }
                }else{
                    $_SESSION['password-not-match'] = "<div class='error'>Password Not Match</div>";
                    header("location:".SITEURL."admin/manage-admin.php");
                }
            }else{
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                header("location:".SITEURL."admin/manage-admin.php");
            }
        }
        //change password if all above is true 

    }
?>

<?php include('partials/footer.php') ?>