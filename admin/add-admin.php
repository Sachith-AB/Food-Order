<?php 
    include ("partials/menu.php");
?>
    <div class="main-content">
        <div class="wrapper">
            <h2>
                Add Admin
            </h2>

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
        
    }
?>