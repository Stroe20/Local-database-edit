<?php include('bits/menu.php')?>
<div class="main">
             <div class="wrapper">
                <h1>Update boala</h1>
                <br /><br />

                <?php
                
                //check  if id is check
                if(isset($_GET['id_boala'])){
                    //get details
                    $id_boala=$_GET['id_boala'];
                    $sql="SELECT * FROM boala WHERE id_boala=$id_boala";
                    $res = mysqli_query($conn,$sql);
                    $count =mysqli_num_rows($res);

                    if($count==1)
                    {
                        //get data
                        $row = mysqli_fetch_assoc($res);
                       
                        $tip = $row['tip'];
                        $gravitate = $row['gravitate'];


                    }else{
                        //redirect with message
                        $_SESSION['no_boala_found']="<div class='error'>Boala not found</div>";
                        header('location:'.SITEURL.'admin/manage.boala.php');
                    }
                }else{
                    //redirect
                    header('location:'.SITEURL.'admin/manage.boala.php');
                }

                ?>
                                    
                <form action="" method="POST" enctype="multipart/form-data">

                    <table class="table-30">

                        <tr>
                            <td>Tip: </td>
                            <td>
                                <input type="text" name="tip" value="<?php echo $tip;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Gravitate: </td>
                            <td>
                                <input type="text" name="gravitate" value="<?php echo $gravitate;?>">
                            </td>
                        </tr>
                        

                        <tr>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="UPDATE BOALA" class="addbutton">
                        </td>
                        </tr>
                    </table>
                </form>

                    <?php
                    
                        if(isset($_POST['submit'])){
                            //echo "clicked";
                            //1.get values
                            $id=$_POST['id'];
                            $tip=$_POST['tip'];
                            $gravitate=$_POST['gravitate'];

                        
                            //3.update database
                            $sql2="UPDATE boala SET
                            tip='$tip',
                            gravitate='$gravitate'
                            WHERE id_boala=$id_boala
                            ";
                            $res2 = mysqli_query($conn,$sql2);
                            //4.redirect
                            if($res2==true){
                                //database updated
                                $_SESSION['update']="<div class='success'>Boala updated successfully</div>";
                                header('location:'.SITEURL.'admin/manage.boala.php');
                            }else{
                                //failed to update boala
                                $_SESSION['update']="<div class='error'>Failed to update</div>";
                                header('location:'.SITEURL.'admin/manage.boala.php');
                            }
                            
                        }
                    
                    ?>

             </div>
</div>