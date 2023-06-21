<?php
include('secure/log.php');

    //check if the id value is set 
    if(isset($_GET['id_cabinet']))
    {
        //get the value and delete
       
        // echo"get value and delete";
        $id_cabinet = $_GET['id_cabinet'];

        //delete data from database
        $sql = "DELETE FROM cabinet WHERE id_cabinet='$id_cabinet'";
        //execute query
        $res = mysqli_query($conn,$sql);
        //check if deleted
        if($res==true)
        {
                $_SESSION['delete']="<div class='success'>Cabinet deleted</div>";
                header('location:'.SITEURL.'admin/manage.cabinet.php');
        }else{
            $_SESSION['delete']="<div class='error'>Cabinet was not deleted</div>";
            header('location:'.SITEURL.'admin/manage.cabinet.php');
        }
      
    }else{
        //redirect to Manage cabinet page
        header('location:'.SITEURL.'admin/manage.cabinet.php');
    }

?>