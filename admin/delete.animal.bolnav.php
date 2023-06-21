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
        $sql2 = "DELETE FROM sufera WHERE id_animal='$id_animal'";
        $sql3="DELETE foloseste, tratament
        FROM foloseste
        JOIN tratament ON foloseste.id_tratament = tratament.id_tratament
        WHERE foloseste.id_animal = '$id_animal'";
        //execute query
        $res = mysqli_query($conn,$sql);
        $res2 = mysqli_query($conn,$sql2);
        $res3 = mysqli_query($conn,$sql3);
        //check if deleted
        if($res==true &&$res2==true &&$res3==true)
        {
                $_SESSION['delete']="<div class='success'>Animal deleted</div>";
                header('location:'.SITEURL.'admin/manage.animal.bolnav.php');
        }else{
            $_SESSION['delete']="<div class='error'>Animal was not deleted</div>";
            header('location:'.SITEURL.'admin/manage.animal.bolnav.php');
        }
        
    }else{
        //redirect to Manage Animal page
        header('location:'.SITEURL.'admin/manage.animal.bolnav.php');
    }

?>