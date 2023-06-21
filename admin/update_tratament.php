<?php include('bits/menu.php')?>
<div class="main">
             <div class="wrapper">
                <h1>Update tratament</h1>
                <br /><br />

                <?php
                
                //check  if id is check
                if(isset($_GET['id_tratament'])){
                    //get details
                    $id_tratament=$_GET['id_tratament'];
                    $sql="SELECT * FROM tratament WHERE id_tratament=$id_tratament";
                    $res = mysqli_query($conn,$sql);
                    $count =mysqli_num_rows($res);

                    if($count==1)
                    {
                        //get data
                        $row = mysqli_fetch_assoc($res);
                        $id_boala = $row['id_boala'];
                        $tip = $row['tip'];
                        $zona = $row['zona'];
                        $durata = $row['durata'];
                        $pret = $row['pret'];

                    }else{
                        //redirect with message
                        $_SESSION['no_tratament_found']="<div class='error'>Tratament not found</div>";
                        header('location:'.SITEURL.'admin/manage.tratament.php');
                    }
                }else{
                    //redirect
                    header('location:'.SITEURL.'admin/manage.tratament.php');
                }

                ?>
                                    
                <form action="" method="POST" enctype="multipart/form-data">

                    <table class="table-30">
                        <tr>
                            <td>ID_Boala: </td>
                            <td>
                                <input type="text" name="id_boala" value="<?php echo $id_boala;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Tip: </td>
                            <td>
                                <input type="text" name="tip" value="<?php echo $tip;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Zona: </td>
                            <td>
                                <input type="text" name="zona" value="<?php echo $zona;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Durata(zile): </td>
                            <td>
                                <input type="text" name="durata" value="<?php echo $durata;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Pret(ron): </td>
                            <td>
                                <input type="text" name="pret" value="<?php echo $pret;?>">
                            </td>
                        </tr>


                        <tr>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="UPDATE TRATAMENT" class="addbutton">
                        </td>
                        </tr>
                    </table>
                </form>

                    <?php
                    
                        if(isset($_POST['submit'])){
                            //echo "clicked";
                            //1.get values
                            $id=$_POST['id'];
                            $id_boala=$_POST['id_boala'];
                            $tip=$_POST['tip'];
                            $zona=$_POST['zona'];
                            $durata=$_POST['durata'];
                            $pret=$_POST['pret'];
                        
                            //3.update database
                            $sql2="UPDATE tratament SET
                            id_boala='$id_boala',
                            tip='$tip',
                            zona='$zona',
                            durata='$durata',
                            pret='$pret'
                            WHERE id_tratament=$id_tratament
                            ";
                            $res2 = mysqli_query($conn,$sql2);
                            //4.redirect
                            if($res2==true){
                                //database updated
                                $_SESSION['update']="<div class='success'>Tratament updated successfully</div>";
                                header('location:'.SITEURL.'admin/manage.tratament.php');
                            }else{
                                //failed to update tratament
                                $_SESSION['update']="<div class='error'>Failed to update</div>";
                                header('location:'.SITEURL.'admin/manage.tratament.php');
                            }
                            
                        }
                    
                    ?>

             </div>
</div>



<?php include('bits/footer.php')?>