<?php 
    include('partials/menu.php')
?>

     <!-- Main section start -->
      <div class="main-content">
        <div class="wrapper">
            <h2>Manage Admin</h2><br>

            <a href="add-admin.php" class="btn-primary"> Add Admin</a><br><br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>sachith abeywardhana</td>
                    <td>sachith2002</td>
                    <td>
                        <div class="col">
                            <a class="edit-btn">Edit</a>
                            <a class="delete-btn">Delete</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>sachith abeywardhana</td>
                    <td>sachith2002</td>
                    <td>
                        <div class="col">
                            <a class="edit-btn">Edit</a>
                            <a class="delete-btn">Delete</a>
                       </div>
                    </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>sachith abeywardhana</td>
                    <td>sachith2002</td>
                    <td class="">
                        <div class="col">
                            <a class="edit-btn">Edit</a>
                            <a class="delete-btn">Delete</a>
                        </div>
                    </td>
                </tr>
                
            </table>
        </div>
      </div>
     <!-- Main section end -->

<?php 
    include('partials/footer.php');
?>
