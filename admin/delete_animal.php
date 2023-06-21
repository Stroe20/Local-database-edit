<?php
include('secure/log.php');

    //check if the id value is set 
    if(isset($_GET['id_animal']))
    {
        //get the value and delete
       
        // echo"get value and delete";
        $id_animal = $_GET['id_animal'];

        //delete data from database
        $sql = "DELETE FROM animal WHERE id_animal='$id_animal'";
        //execute query
        $res = mysqli_query($conn,$sql);
        //check if deleted
        if($res==true)
        {
                $_SESSION['delete']="<div class='success'>Animal deleted</div>";
                header('location:'.SITEURL.'admin/manage.animal.php');
        }else{
            $_SESSION['delete']="<div class='error'>Animal was not deleted</div>";
            header('location:'.SITEURL.'admin/manage.animal.php');
        }
        
    }else{
        //redirect to Manage Animal page
        header('location:'.SITEURL.'admin/manage.animal.php');
    }

?>