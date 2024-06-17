<?php 
    include('partials/menu.php')
?>

     <!-- Main section start -->
      <div class="main-content">
        <div class="wrapper">
            <h2>Manage Admin</h2><br>

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?><br><br>

            <a href="add-admin.php" class="btn-primary"> Add Admin</a><br><br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php 
                $sql = 'SELECT * FROM tbl_admin';
                $res = mysqli_query($conn, $sql);
                if($res == true){
                    $count = mysqli_num_rows($res);

                    $sn = 1;

                    if($count > 0){
                        while($rows = mysqli_fetch_assoc($res)){
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];
                            
                            ?>
                                <tr>
                                    <td><?php echo $sn++ ?></td>
                                    <td><?php echo $full_name ?></td>
                                    <td><?php echo $username ?></td>
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
                        echo'Not admin yet';
                    }
                }
                ?>
                
                
               
                
            </table>
        </div>
      </div>
     <!-- Main section end -->

<?php 
    include('partials/footer.php');
?>
