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

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['user-not-found'])){
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
                
                if(isset($_SESSION['password-not-match'])){
                    echo $_SESSION['password-not-match'];
                    unset($_SESSION['password-not-match']);
                }

                if(isset($_SESSION['change-password'])){
                    echo $_SESSION['change-password'];
                    unset($_SESSION['change-password']);
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
                                            <a href="<?php echo SITEURL; ?>admin/change-password-admin.php?id=<?php echo $id; ?>" class="change-password-btn">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="edit-btn">Edit</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="delete-btn">Delete</a>
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
