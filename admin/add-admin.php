<?php include ("partials/menu.php");?>



    <div class="main-content">
        <div class="wrapper">
            <h2>
                Add Admin
            </h2>

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?><br><br>

            <form action="" method="post">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="full-name" placeholder="full name"></td><br>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" placeholder="username"></td><br>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" placeholder="password"></td><br>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Add Admin" class="edit-btn"></td><br>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php 
include ("partials/footer.php");
?>

<?php
    //process the value form and save it in database
    //check whether the button is clicked or not

    if(isset($_POST["submit"])){
        //button clicked
        //get data from form

        $full_name = $_POST['full-name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encryption with MD5

        //sql query to save data in to database
        $sql = "INSERT INTO tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        password = '$password'";

        // execute query and save data  into database
        $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

        //check wether the (query executed) or not

        if($res== true){
            //create session variables
            $_SESSION['add'] = '<div class="success">Admin added successfully</div>';
            header('location:'.SITEURL.'admin/manage-admin.php');
        }else{
            $_SESSION['add'] = '<div class="error">Admin added failed</div>';
            header('location:'.SITEURL.'admin/add-admin.php');
        }
        
    }
?>