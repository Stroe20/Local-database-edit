<?php include('bits/menu.php')?>
<div class="main">
            <div class="wrapper">
                <h1>Angajati</h1>
                <br /><br />
                    <?php
            
                        if(isset($_SESSION['add']))
                            {
                                 echo $_SESSION['add'];
                                 unset($_SESSION['add']);
                            }
                            if(isset($_SESSION['remove']))
                            {
                                echo $_SESSION['remove'];
                                unset($_SESSION['remove']);
                            }
                            if(isset($_SESSION['delete']))
                            {
                                echo $_SESSION['delete'];
                                unset($_SESSION['delete']);
                            }
                            if(isset($_SESSION['no_angajat_found']))
                            {
                                echo $_SESSION['no_angajat_found'];
                                unset($_SESSION['no_angajat_found']);
                            }
                            if(isset(   $_SESSION['update']))
                            {
                                echo    $_SESSION['update'];
                                unset(   $_SESSION['update']);
                            }


                    ?>
                 <br><br>
                <a href="<?php echo SITEURL;?>admin/add_angajat.php" class="addbutton">ADD ANGAJAT</a>
                <br /><br /><br />
                <table class="table-full">
                    <tr>
                        <th>ID</th>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Specializare</th>
                        <th>Data nasterii</th>
                        <th>Telefon</th>
                        <th>E-mail</th>
                        <th>Salariu</th>
                        
                    </tr>


                    <?php
                    
                            //query to get all data from database
                            $sql = "SELECT *FROM angajat";
                            //execute query
                            $res = mysqli_query($conn,$sql);
                            //count rows
                            $count = mysqli_num_rows($res);
                            //create serial number variable
                            $sn=1;
                            //check if there is data in database or not
                            if($count>0)
                            {
                                //we have data

                                //get the data and display
                                while($row=mysqli_fetch_assoc($res)){
                                    $id_angajat = $row['id_angajat'];
                                    $nume=$row['nume'];
                                    $prenume=$row['prenume'];
                                    $specializare=$row['specializare'];
                                    $data_nasterii=$row['data_nasterii'];
                                    $tel=$row['tel'];
                                    $email=$row['email'];
                                    $salariu=$row['salariu'];
                                    
                                    ?>

                                <tr>
                                    <td><?php echo $id_angajat;?></td>
                                    <td><?php echo $nume;?></td>
                                    <td><?php echo $prenume;?></td>
                                    <td><?php echo $specializare;?></td>
                                    <td><?php echo $data_nasterii;?></td>
                                    <td><?php echo $tel;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $salariu;?></td>
                                    <td>
                                        
                                        <a href="<?php echo SITEURL ;?>admin/update_angajat.php?id_angajat=<?php echo $id_angajat;?>" class="addbutton">UPDATE ANGAJAT</a>
                                        <a href="<?php echo SITEURL ;?>admin/delete_angajat.php?id_angajat=<?php echo $id_angajat;?>" class="deletebutton">DELETE ANGAJAT</a>
                                    </td>
                                </tr>


                                    <?php


                                }

                            }else{
                                //we do not have data
                                //we'll display the message
                                ?>

                                <tr>
                                    <td colspan="6"><divc lass = "error">Nu au fost adaugati angajati</div></td>
                                </tr>

                                <?php
                            }
                    
                    ?>


                </table>
            </div>
        </div>
<?php include('bits/footer.php')?>