<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h2>Add Food</h2><br><br>

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
    </div>
</div>
<?php include('partials/footer.php') ?>