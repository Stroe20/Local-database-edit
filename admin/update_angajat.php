<?php include('bits/menu.php')?>
<div class="main">
             <div class="wrapper">
                <h1>Update angajat</h1>
                <br /><br />

                <?php
                
                //check  if id is check
                if(isset($_GET['id_angajat'])){
                    //get details
                    $id_angajat=$_GET['id_angajat'];
                    $sql="SELECT * FROM angajat WHERE id_angajat=$id_angajat";
                    $res = mysqli_query($conn,$sql);
                    $count =mysqli_num_rows($res);

                    if($count==1)
                    {
                        //get data
                        $row = mysqli_fetch_assoc($res);
                        $nume = $row['nume'];
                        $prenume = $row['prenume'];
                        $specializare = $row['specializare'];
                        $data_nasterii = $row['data_nasterii'];
                        $tel = $row['tel'];
                        $email = $row['email'];
                        $salariu = $row['salariu'];

                    }else{
                        //redirect with message
                        $_SESSION['no_angajat_found']="<div class='error'>Angajat not found</div>";
                        header('location:'.SITEURL.'admin/manage.angajat.php');
                    }
                }else{
                    //redirect
                    header('location:'.SITEURL.'admin/manage.angajat.php');
                }

                ?>
                                    
                <form action="" method="POST" enctype="multipart/form-data">

                    <table class="table-30">
                        <tr>
                            <td>Nume: </td>
                            <td>
                                <input type="text" name="nume" value="<?php echo $nume;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Prenume: </td>
                            <td>
                                <input type="text" name="prenume" value="<?php echo $prenume;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Specializare: </td>
                            <td>
                                <input type="text" name="specializare" value="<?php echo $specializare;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Data nasterii: </td>
                            <td>
                                <input type="date" name="data_nasterii" value="<?php echo $data_nasterii;?>">
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
                            <td>Salariu: </td>
                            <td>
                                <input type="text" name="salariu" value="<?php echo $salariu;?>">
                            </td>
                        </tr>

                        <tr>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="UPDATE ANGAJAT" class="addbutton">
                        </td>
                        </tr>
                    </table>
                </form>

                    <?php
                    
                        if(isset($_POST['submit'])){
                            //echo "clicked";
                            //1.get values
                            $id=$_POST['id'];
                            $nume=$_POST['nume'];
                            $prenume=$_POST['prenume'];
                            $specializare = $row['specializare'];
                            $data_nasterii=$_POST['data_nasterii'];
                            $tel=$_POST['tel'];
                            $email=$_POST['email'];
                            $salariu=$_POST['salariu'];
                        
                            //3.update database
                            $sql2="UPDATE angajat SET
                            nume='$nume',
                            prenume='$prenume',
                            specializare='$specializare',
                            data_nasterii='$data_nasterii',
                            tel='$tel',
                            email='$email',
                            salariu='$salariu'
                            WHERE id_angajat=$id_angajat
                            ";
                            $res2 = mysqli_query($conn,$sql2);
                            //4.redirect
                            if($res2==true){
                                //database updated
                                $_SESSION['update']="<div class='success'>Angajat updated successfully</div>";
                                header('location:'.SITEURL.'admin/manage.angajat.php');
                            }else{
                                //failed to update angajat
                                $_SESSION['update']="<div class='error'>Failed to update</div>";
                                header('location:'.SITEURL.'admin/manage.angajat.php');
                            }
                            
                        }
                    
                    ?>

             </div>
</div>



<?php include('bits/footer.php')?>