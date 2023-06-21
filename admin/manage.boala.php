<?php include('bits/menu.php')?>
<div class="main">
            <div class="wrapper">
                <h1>Boli</h1>
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
                            if(isset($_SESSION['no_boala_found']))
                            {
                                echo $_SESSION['no_boala_found'];
                                unset($_SESSION['no_boala_found']);
                            }
                            if(isset(   $_SESSION['update']))
                            {
                                echo    $_SESSION['update'];
                                unset(   $_SESSION['update']);
                            }


                    ?>
                 <br><br>
                <a href="<?php echo SITEURL;?>admin/add.boala.php" class="addbutton">ADD BOALA</a>
                <br /><br /><br />
                <table class="table-full">
                    <tr>
                        <th>ID</th>
                        <th>Tip</th>
                        <th>Gravitate</th>
                        
                    </tr>


                    <?php
                    
                            //query to get all data from database
                            $sql = "SELECT *FROM boala";
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
                                    $id_boala = $row['id_boala'];
                                    $tip=$row['tip'];
                                    $gravitate=$row['gravitate'];

                                    
                                    ?>

                                <tr>
                                    <td><?php echo $id_boala;?></td>
                                    <td><?php echo $tip;?></td>
                                    <td><?php echo $gravitate;?></td>

                                    <td>
                                        
                                        <a href="<?php echo SITEURL ;?>admin/update_boala.php?id_boala=<?php echo $id_boala;?>" class="addbutton">UPDATE BOALA</a>
                                        <a href="<?php echo SITEURL ;?>admin/delete_boala.php?id_boala=<?php echo $id_boala;?>" class="deletebutton">DELETE BOALA</a>
                                    </td>
                                </tr>


                                    <?php


                                }

                            }else{
                                //we do not have data
                                //we'll display the message
                                ?>

                                <tr>
                                    <td colspan="6"><divc lass = "error">Nu au fost adaugate boli</div></td>
                                </tr>

                                <?php
                            }
                    
                    ?>


                </table>
            </div>
        </div>
<?php include('bits/footer.php')?>