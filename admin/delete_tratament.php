<?php
include('secure/log.php');

    //check if the id value is set 
    if(isset($_GET['id_tratament']))
    {
        //get the value and delete
       
        // echo"get value and delete";
        $id_tratament = $_GET['id_tratament'];

        //delete data from database
        $sql = "DELETE FROM tratament WHERE id_tratament='$id_tratament'";
        //execute query
        $res = mysqli_query($conn,$sql);
        //check if deleted
        if($res==true)
        {
                $_SESSION['delete']="<div class='success'>Tratament deleted</div>";
                header('location:'.SITEURL.'admin/manage.tratament.php');
        }else{
            $_SESSION['delete']="<div class='error'>Tratament was not deleted</div>";
            header('location:'.SITEURL.'admin/manage.tratament.php');
        }
        
    }else{
        //redirect to Manage tratament page
        header('location:'.SITEURL.'admin/manage.tratament.php');
    }

?>