<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h2>Add Food</h2><br><br>

        <?php 
            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <input type="text" name="title" id="" placeholder="Title"><br><br>
                </tr>
                <tr>
                    <textarea name="description" rows="5" cols="25" id="" placeholder="Description"></textarea>
                </tr><br>
                <tr>
                    <input type="number" name="price" id="" placeholder="Price">
                </tr><br><br>
                <tr>
                    <input type="file" name="price" id="" placeholder="Price">
                </tr><br><br>
                <tr>
                    <p>Category</p>
                    <select name="category" id="">
                        <?php 
                            //create php code to display category
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $title= $row['title'];
                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title ?></option>
                                    <?php
                                }
                            }else{
                                ?>
                                <option value="0">No Category Found</option>
                                <?php
                            }
                        ?>
                        <option value="1">Food</option>
                        <option value="2">Snacks</option>
                    </select>
                </tr><br><br>
                <tr>
                    <p>Feature:</p>
                    <input type="radio" name="featured" id="" value="Yes">Yes
                    <input type="radio" name="featured" id="" value="No">No
                </tr><br><br>
                <tr>
                    <p>Active:</p>
                    <input type="radio" name="featured" id="" value="Yes">Yes
                    <input type="radio" name="featured" id="" value="No">No
                </tr><br>
                <input type="submit" value="Submit" name="submit" class="edit-btn">
            </table>
        </form>
        <?php 
            if (isset($_POST['submit'])) {
                //add food in database
                //echo'clicked';
                //get data from form
                $title = $_POST['title'];
                $description= $_POST['description'];
                $price= $_POST['price'];
                $category = $_POST['category'];

                if(isset($_POST['featured'])){
                    $feature= $_POST['featured'];
                }else{
                    $feature= 'No';
                }

                if(isset($_POST['active'])){
                    $active= $_POST['active'];
                }else{
                    $active= 'No';
                }

                if(isset($_FILES['image']['name'])){
                    $image = $_FILES['image']['name'];

                    //check whether image selected or not
                    if($image != ''){
                        $ext = end(explode('.', $image));
                        $image = "food_".rand(0000,9999).".".$ext;
                        $src = $_FILES['image']['tmp_name'];

                        $dst = "../images/food/".$image;
                        $upload = move_uploaded_file($src, $dst);

                        if($upload == false){
                            $_SESSION['upload'] = '<div class="error">Faild to upload image</div>';
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }else{

                        }
                    }
                }else{
                    $image = "";
                }
                // insert into database
            }
            $sql2 = "INSERT INTO tbl_food SET
            title='$title',
            description='$description',
            price='$price',
            image_name='$image',
            category_id='$category',
            featured='$feature',
            active='$active'
            ";
            $res2 = mysqli_query($conn, $sql2);
            if($res2 == true){
                $_SESSION["insert"] = "<div class='success'>Food addedd successfully</div>";
                //header("location:".SITEURL."admin/manage-food.php");
            }else{
                $_SESSION["insert"] = "<div class='error'>Food addedd successfully</div>";
                header("location:".SITEURL."admin/manage-food.php");
            }
        ?>
    </div>
</div>
<?php include('partials/footer.php') ?>