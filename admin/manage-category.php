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
                                    <td><?php echo $image ?></td>
                                    <td><?php echo $feature ?></td>
                                    <td><?php echo $active ?></td>
                                    <td>
                                        <div class="col">
                                            <a class="edit-btn">Edit</a>
                                            <a class="delete-btn">Delete</a>
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