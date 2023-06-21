<?php
include('secure/log.php');

    //check if the id value is set 
    if(isset($_GET['id_boala']))
    {
        //get the value and delete
       
        // echo"get value and delete";
        $id_boala = $_GET['id_boala'];

        //delete data from database
        $sql = "DELETE FROM boala WHERE id_boala='$id_boala'";
        //execute query
        $res = mysqli_query($conn,$sql);
        //check if deleted
        if($res==true)
        {
                $_SESSION['delete']="<div class='success'>Boala deleted</div>";
                header('location:'.SITEURL.'admin/manage.boala.php');
        }else{
            $_SESSION['delete']="<div class='error'>Boala was not deleted</div>";
            header('location:'.SITEURL.'admin/manage.boala.php');
        }
  
    }else{
        //redirect to Manage Boala page
        header('location:'.SITEURL.'admin/manage.boala.php');
    }

?>