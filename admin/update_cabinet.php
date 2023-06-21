<?php include('bits/menu.php')?>
<div class="main">
             <div class="wrapper">
                <h1>Update cabinet</h1>
                <br /><br />

                <?php
                
                //check  if id is check
                if(isset($_GET['id_cabinet'])){
                    //get details
                    $id_cabinet=$_GET['id_cabinet'];
                    $sql="SELECT * FROM cabinet WHERE id_cabinet=$id_cabinet";
                    $res = mysqli_query($conn,$sql);
                    $count =mysqli_num_rows($res);

                    if($count==1)
                    {
                        //get data
                        $row = mysqli_fetch_assoc($res);
                        $judet = $row['judet'];
                        $localitate = $row['localitate'];
                        $strada = $row['strada'];
                        $nr = $row['nr'];
                        $tel = $row['tel'];
                        $email = $row['email'];

                    }else{
                        //redirect with message
                        $_SESSION['no_cabinet_found']="<div class='error'>Cabinet not found</div>";
                        header('location:'.SITEURL.'admin/manage.cabinet.php');
                    }
                }else{
                    //redirect
                    header('location:'.SITEURL.'admin/manage.cabinet.php');
                }

                ?>
                                    
                        <form action="" method="POST" enctype="multipart/form-data">

                                    <table class="table-30">
                                        <tr>
                                            <td>Judet: </td>
                                            <td>
                                                <input type="text" name="judet" value="<?php echo $judet;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Localitate: </td>
                                            <td>
                                                <input type="text" name="localitate" value="<?php echo $localitate;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Strada: </td>
                                            <td>
                                                <input type="text" name="strada" value="<?php echo $strada;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nr: </td>
                                            <td>
                                                <input type="text" name="nr" value="<?php echo $nr;?>">
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>Telefon: </td>
                                            <td>
                                                <input type="text" name="tel" value="<?php echo $tel;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>E-mail: </td>
                                            <td>
                                                <input type="text" name="email" value="<?php echo $email;?>">
                                            </td>
                                        </tr>


                                        <tr>
                                        <td>
                                            <input type="hidden" name="id" value="<?php echo $id;?>">
                                            <input type="submit" name="submit" value="UPDATE Cabinet" class="addbutton">
                                        </td>
                                        </tr>
                                    </table>
                     </form>

                    <?php
                    
                        if(isset($_POST['submit'])){
                            //echo "clicked";
                            //1.get values
                            $id=$_POST['id'];
                            $judet=$_POST['judet'];
                            $localitate=$_POST['localitate'];
                            $strada=$_POST['strada'];
                            $nr=$_POST['nr'];
                            $tel=$_POST['tel'];
                            $email=$_POST['email'];

                        
                            //3.update database
                            $sql2="UPDATE cabinet SET
                            judet='$judet',
                            localitate='$localitate',
                            strada='$data_stradanasterii',
                            nr='$nr',
                            tel='$tel',
                            email='$email'
                            WHERE id_cabinet=$id_cabinet
                            ";
                            $res2 = mysqli_query($conn,$sql2);
                            //4.redirect
                            if($res2==true){
                                //database updated
                                $_SESSION['update']="<div class='success'>Cabinet updated successfully</div>";
                                header('location:'.SITEURL.'admin/manage.cabinet.php');
                            }else{
                                //failed to update cabinet
                                $_SESSION['update']="<div class='error'>Failed to update</div>";
                                header('location:'.SITEURL.'admin/manage.cabinet.php');
                            }
                            
                        }
                    
                    ?>

             </div>
</div>



<?php include('bits/footer.php')?>