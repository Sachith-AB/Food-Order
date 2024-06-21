<?php include("partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h2>Add Category</h2><br><br>

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="post">
            <input type="text" name="title" placeholder="Title"><br><br>
            <p>Feature:</p>
            <input type="radio" name="feature" id="" value="Yes"> Yes
            <input type="radio" name="feature" id="" value="No"> No
            <br><br>
            <p>Active:</p>
            <input type="radio" name="active" value="Yes"> Yes
            <input type="radio" name="active" value="No"> No
            <br><br>
            <input type="submit" name="submit" value="Add Category" class="edit-btn">
        </form>
        <?php 
            if(isset($_POST["submit"])){
                //echo"clicked";
                $title=$_POST['title'];
                
                if(isset($_POST['feature'])){
                    $feature=$_POST['feature'];
                }else{
                    $feature='No';
                }

                if(isset($_POST['active'])){
                    $active=$_POST['active'];
                }else{
                    $active= 'No';
                }
                
                $sql = "INSERT INTO tbl_category SET 
                title='$title',
                featured='$feature',
                active='$active'
                ";

                $res = mysqli_query($conn, $sql);

                if($res == true){
                    //echo "added";
                    $_SESSION['add'] = '<div class="success">Category added successfully</div>';
                    header('location:'.SITEURL.'admin/manage-category.php');
                }else{
                    //echo "error";
                    $_SESSION['add'] = '<div class="error">Category added fail</div>';
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }

            
        ?>
    </div>
</div>

<?php include("partials/footer.php"); ?>