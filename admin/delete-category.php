<?php
    include("../config/constant.php");

    //check wether id and image value set or not
    if(isset($_GET["id"]) AND isset($_GET["image_name"])){
        //get value to delete
        //echo"delete";
        $id = $_GET["id"];
        $image=$_GET["image_name"];

        //remove the pysical image file
        if($image != " "){
            $path="../images/category/".$image;
            $remove = unlink($path);

            if(!$remove){

                $_SESSION['remove'] = "<div class='error'>Fail to remove image</div>";
                //header("location:".SITEURL."admin/manage-category.php");
                //create session msg and redirect to manage-category page
                die();
            }
        }
        //delete data from database
        $sql = "DELETE tbl_category WHERE id=$id";
        $res=mysqli_query($conn,$sql);
        if($res == true){
            $_SESSION["delete"] = "<div class='success'>Delete success</div>";
            header("location:".SITEURL."admin/manage-category");
        }else{
            $_SESSION["delete"] = "<div class='error'>Failed to delete</div>";
            header("location:".SITEURL."admin/manage-category");
        }
        //redirect to manage-catogory page

    }else{
        //redirect to manage category page
        header("location:".SITEURL."admin/manage-category.php");
    }
?>