<?php
include('secure/log.php');

    //check if the id value is set 
    if(isset($_GET['id_angajat']))
    {
        //get the value and delete
       
        // echo"get value and delete";
        $id_angajat = $_GET['id_angajat'];

        //delete data from database
        $sql = "DELETE FROM angajat WHERE id_angajat='$id_angajat'";
        //execute query
        $res = mysqli_query($conn,$sql);
        //check if deleted
        if($res==true)
        {
                $_SESSION['delete']="<div class='success'>Angajat deleted</div>";
                header('location:'.SITEURL.'admin/manage.angajat.php');
        }else{
            $_SESSION['delete']="<div class='error'>Angajat was not deleted</div>";
            header('location:'.SITEURL.'admin/manage.angajat.php');
        }
        
    }else{
        //redirect to Manage Angajat page
        header('location:'.SITEURL.'admin/manage.angajat.php');
    }

?>