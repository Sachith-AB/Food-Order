<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h2>Update Admin</h2>
        <?php 
            //get the id
            $id = $_GET['id'];
            //create sql query for get details
            $sql = "SELECT * FROM tbl_admin WHERE id='$id'
            ";
            //EXEcute the query
            $res = mysqli_query($conn, $sql);

            // check whether query execute or not

            if ($res == true) {
                $count = mysqli_num_rows($res);
                if($count == 1){
                    echo"Admin available";
                    $row = mysqli_fetch_assoc($res);
                   $full_name = $row['full_name'];
                   $username = $row['username']; 
                }else{
                    //redeirect to manage admin page
                    header("location:".SITEURL."admin/manage-admin.php");
                }
            }
        ?>
        <form action="" method="post">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="full_name" placeholder="full name" value="<?php echo$full_name; ?>"></td><br>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" placeholder="username" value="<?php echo $username; ?>"></td><br>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" id="" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update" class="edit-btn">
                        </td><br>
                    </tr>
                </table>
            </form>
    </div>
</div>

<?php
    //check whether submit button is clicked or not
    if(isset($_POST["submit"])){
        //echo"button clicked";
        //get all value from form to update
        echo $id = $_POST['id'];
        echo $full_name = $_POST['full_name'];
        echo $username = $_POST['username'];

        //create sql query to update
        $sql = "UPDATE tbl_admin SET full_name='$full_name',
        username='$username'
        WHERE id='$id'
        ";

        //execute query
        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";
            header("location:".SITEURL."admin/manage-admin.php");  //redirect to manage admin page
        }else{
            $_SESSION['update'] = "<div class='error'>Admin Update failed</div>";
            header("location:".SITEURL."admin/manage-admin.php");
        }
    }
?>

<?php include('partials/footer.php') ?>