<?php include('bits/menu.php')?>
<div class="main">
            <div class="wrapper">
                <h1>Cabinet</h1>
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
                            if(isset($_SESSION['no_cabinet_found']))
                            {
                                echo $_SESSION['no_cabinet_found'];
                                unset($_SESSION['no_cabinet_found']);
                            }
                            if(isset(   $_SESSION['update']))
                            {
                                echo    $_SESSION['update'];
                                unset(   $_SESSION['update']);
                            }


                    ?>
                 <br><br>
                <a href="<?php echo SITEURL;?>admin/add.cabinet.php" class="addbutton">ADD Cabinet</a>
                <br /><br /><br />
                <table class="table-full">
                    <tr>
                        <th>ID</th>
                        <th>Judet</th>
                        <th>Localitate</th>
                        <th>Strada </th>
                        <th>Nr</th>
                        <th>Telefon</th>
                        <th>E-mail</th>
                        
                    </tr>


                    <?php
                    
                            //query to get all data from database
                            $sql = "SELECT *FROM cabinet";
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
                                    $id_cabinet = $row['id_cabinet'];
                                    $judet=$row['judet'];
                                    $localitate=$row['localitate'];
                                    $strada=$row['strada'];
                                    $nr=$row['nr'];
                                    $tel=$row['tel'];
                                    $email=$row['email'];
                                    
                                    
                                    ?>

                                <tr>
                                    <td><?php echo $id_cabinet;?></td>
                                    <td><?php echo $judet;?></td>
                                    <td><?php echo $localitate;?></td>
                                    <td><?php echo $strada;?></td>
                                    <td><?php echo $nr;?></td>
                                    <td><?php echo $tel;?></td>
                                    <td><?php echo $email;?></td>
                                    <td>
                                        
                                        <a href="<?php echo SITEURL ;?>admin/update_cabinet.php?id_cabinet=<?php echo $id_cabinet;?>" class="addbutton">UPDATE CABINET</a>
                                        <a href="<?php echo SITEURL ;?>admin/delete_cabinet.php?id_cabinet=<?php echo $id_cabinet;?>" class="deletebutton">DELETE CABINET</a>
                                    </td>
                                </tr>


                                    <?php


                                }

                            }else{
                                //we do not have data
                                //we'll display the message
                                ?>

                                <tr>
                                    <td colspan="6"><divc lass = "error">Nu a fost adaugat cabinet</div></td>
                                </tr>

                                <?php
                            }
                    
                    ?>


                </table>
            </div>
        </div>
<?php include('bits/footer.php')?>