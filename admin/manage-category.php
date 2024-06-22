<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h2>Manage Category</h2><br>

       

        <a href="add-category.php" class="btn-primary"> Add category</a><br><br>

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove'])){
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['category-not-found'])){
                echo $_SESSION['category-not-found'];
                unset($_SESSION['category-not-found']);
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Feature</th>
                    <th>Active</th>
                </tr>

                <?php 
                    $sql = 'SELECT * FROM   tbl_category';
                    $res = mysqli_query($conn, $sql);
                    if($res == true){
                        $count = mysqli_num_rows($res);
                        $sn=1;
                        if($count > 0){
                            while($row = mysqli_fetch_array($res)){
                                $id= $row['id'];
                                $title=$row['title'];
                                $image=$row['image_name'];
                                $feature=$row['featured'];
                                $active=$row['active'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++ ?></td>
                                    <td><?php echo $title ?></td>
                                    <td>
                                        <?php 
                                            if($image != ''){
                                                ?>
                                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image; ?>" alt="category-image" class="image-style">
                                                <?php
                                            }else{
                                                echo'<div class="error">Image not added</div>';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $feature ?></td>
                                    <td><?php echo $active ?></td>
                                    <td>
                                        <div class="col">
                                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image ?>" class="edit-btn">Edit</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image?>" class="delete-btn">Delete</a>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                            }
                        }else{
                            echo 'No Category yet';
                        }
                    }
                ?>

                
                
                
            </table>
    </div>
</div>
<?php include('partials/footer.php'); ?>