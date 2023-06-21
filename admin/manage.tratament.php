<?php include('bits/menu.php')?>
<div class="main">
            <div class="wrapper">
                <h1>Tratamente</h1>
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
                            if(isset($_SESSION['no_tratament_found']))
                            {
                                echo $_SESSION['no_tratament_found'];
                                unset($_SESSION['no_tratament_found']);
                            }
                            if(isset(   $_SESSION['update']))
                            {
                                echo    $_SESSION['update'];
                                unset(   $_SESSION['update']);
                            }


                    ?>
                 <br><br>
                <a href="<?php echo SITEURL;?>admin/add.tratament.php" class="addbutton">ADD TRATAMENT</a>
                <br /><br /><br />
                <table class="table-full">
                    <tr>
                        <th>ID_Tratament</th>
                        <th>ID_Boala</th>
                        <th>Tip</th>
                        <th>Zona</th>
                        <th>Durata(zile)</th>
                        <th>Pret(ron)</th>
                        
                    </tr>


                    <?php
                    
                            //query to get all data from database
                            $sql = "SELECT *FROM tratament";
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
                                    $id_tratament = $row['id_tratament'];
                                    $id_boala=$row['id_boala'];
                                    $tip=$row['tip'];
                                    $zona=$row['zona'];
                                    $durata=$row['durata'];
                                    $pret=$row['pret'];
                               
                                    
                                    ?>

                                <tr>
                                    <td><?php echo $id_tratament;?></td>
                                    <td><?php echo $id_boala;?></td>
                                    <td><?php echo $tip;?></td>
                                    <td><?php echo $zona;?></td>
                                    <td><?php echo $durata;?></td>
                                    <td><?php echo $pret;?></td>
                                    <td>
                                        
                                        <a href="<?php echo SITEURL ;?>admin/update_tratament.php?id_tratament=<?php echo $id_tratament;?>" class="addbutton">UPDATE TRATAMENT</a>
                                        <a href="<?php echo SITEURL ;?>admin/delete_tratament.php?id_tratament=<?php echo $id_tratament;?>" class="deletebutton">DELETE TRATAMENT</a>
                                    </td>
                                </tr>


                                    <?php


                                }

                            }else{
                                //we do not have data
                                //we'll display the message
                                ?>

                                <tr>
                                    <td colspan="6"><divc lass = "error">Nu au fost adaugate tratamente</div></td>
                                </tr>

                                <?php
                            }
                    
                    ?>


                </table>
            </div>
        </div>
<?php include('bits/footer.php')?>