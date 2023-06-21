<?php include('bits/menu.php')?>

    <div class="main">
        <div class="wrapper">
            <h1>Adauga boala</h1>
            
            <br><br>

            <?php
            
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }


            ?>

            <br><br>
            <!--Form start-->
            <form action="" method="POST" enctype="multipart/form-data">

                <table class="table-30">

                    <tr>
                        <td>Tip: </td>
                        <td>
                            <input type="text" name="tip" placeholder="Tip boala">
                        </td>
                    </tr>
                    <tr>
                        <td>Gravitate: </td>
                        <td>
                            <input type="text" name="gravitate" placeholder="Gravitate">
                        </td>
                    </tr>
                    

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Adauga Boala" class="addbutton">
                    </td>
                </tr>
                </table>
            </form>
            <!--Form end-->
            <?php 
            
            //check if submit button is clicked
            if(isset($_POST['submit']))
            {
                //echo "clicked";
                //1. get value from  form
         
                 $tip=$_POST['tip'];
                 $gravitate=$_POST['gravitate'];




                 //2. create sql query to insert into  database
                 $sql="INSERT INTO boala SET
               
                 tip='$tip',
                 gravitate='$gravitate'


                 ";
                 //3. execute query
                 $res = mysqli_query($conn,$sql);

                 //4.Check if the query  executed
                 if($res==TRUE)
                 {
                    //query executed and cat added
                    $_SESSION['add']="<div class='success'>Boala adaugata cu succes</div>";
                    //redirect to manage boala page
                    header('location:'.SITEURL.'admin/manage.boala.php');
                 }else{
                    //failed to add
                    $_SESSION['add']="<div class='error'>Boala nu a fost adaugata</div>";
                    //redirect to add boala page
                    header('location:'.SITEURL.'admin/add.boala.php');
                 }
            
            }
            
            ?>
        </div>
    </div>

<?php include('bits/footer.php')?>