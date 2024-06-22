<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h2>Update Category</h2><br><br>
        <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                

                $sql = "SELECT * FROM tbl_category WHERE id=$id";
                $res = mysqli_query($conn, $sql);

                if($res == true){
                    $count = mysqli_num_rows($res);
                    if($count == 1){
                        echo"Category Availble";
                        $row=mysqli_fetch_assoc($res);
                        $title=$row['title'];
                        $feature = $row['featured'];
                        $active = $row['active'];
                        $image_name=$row['image_name'];
                    }else{
                        $_SESSION['category-not-found'] = "<div class='error'>Category not found</div>";
                        header("location:".SITEURL."admin/manage-category.php");
                    }
                }else{
                    header("location:".SITEURL."admin/manage-category.php");
                }

            }else{
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" value="<?php echo $title ?>"><br><br>
            <p>Current Image:</p><br>
            <?php 
                if($image_name != ''){
            ?>
                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="category-image" class="image-style">
            <?php
                }else{
                    echo'<div class="error">Image not added</div>';
                }
            ?>
            <p>New Image:</p><br>
            <input type="file" name="image" id=""><br><br>
            <p>Feature:</p>
            <input <?php if($feature == 'Yes') {echo "checked";} ?> type="radio" name="feature" id="" value="<?php echo $feature ?>"> Yes
            <input <?php if($feature == 'No') {echo "checked";} ?>  type="radio" name="feature" id="" value="<?php echo $feature ?>"> No
            <br><br>
            <p>Active:</p>
            <input <?php if($active == 'Yes') {echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
            <input <?php if($active == 'No') {echo "checked";} ?> type="radio" name="active" value="No"> No
            <br><br>
            <input type="hidden" name="current-image" value="<?php echo $current_image; ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" value="Update Category" class="edit-btn">
        </form>
        <?php
            if(isset($_POST["submit"])){
                //echo"clicked";
                $id = $_POST['id'];
                $title = $_POST["title"];
                $current_image= $_POST['current-image'];
                $feature = $_POST["feature"];
                $active = $_POST["active"];

                //updating new image
                $sql2 = "UPDATE tbl_category SET 
                title='$title',
                featured='$feature',
                active='$active'
                WHERE id='$id'";

                $res2=mysqli_query($conn,$sql2);

                if($res==true){
                    //redirect with sesstion
                    $_SESSION['update']="<div class='success'>Updated successfully</div>";
                    header("location:".SITEURL."admin/manage-category.php");
                }else{
                    $_SESSION['update']="<div class='error'>Updated failed</div>";
                    header("location:".SITEURL."admin/manage-category.php");
                }
                
            }

        ?>
    </div>
</div>

<?php include('partials/footer.php')?>