<?php include('bits/menu.php')?>
<div class="main">
            <div class="wrapper">
                <h1>Animale</h1>
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
                            if(isset($_SESSION['no_animal_found']))
                            {
                                echo $_SESSION['no_animal_found'];
                                unset($_SESSION['no_animal_found']);
                            }
                            if(isset(   $_SESSION['update']))
                            {
                                echo    $_SESSION['update'];
                                unset(   $_SESSION['update']);
                            }


                    ?>
                 <br><br>
                 <a href="<?php echo SITEURL;?>admin/add.animal.php" class="addbutton">ADD ANIMAL</a>

                <a href="<?php echo SITEURL;?>admin/manage.animal.sanatos.php" class="addbutton">ANIMALE SANATOASE</a>
                <a href="<?php echo SITEURL;?>admin/manage.animal.bolnav.php" class="addbutton">ANIMALE BOLNAVE</a>
                <a href="<?php echo SITEURL;?>admin/manage.animal.php" class="addbutton">LISTA ANIMALE</a>
                                <br /><br /><br />
                <table class="table-full">
                <tr>
                        <th>ID</th>
                        <th>Nume</th>
                        <th>Specie</th>
                        <th>Data nasterii</th>
                        <th>Gen</th>
                        <th>Stare</th>
                        <th>Boala</th>
                        <th>Zona afectata</th>
                        <th>Durata tratament(zile)</th>
                        <th>Pret tratare(ron)</th>
                        <th>Data sosirii</th>
                        <th>Data plecarii</th>
                        
                    </tr>


                    <?php
                    
                            //query to get all data from database
                            $sql = "select animal.id_animal,animal.specie, animal.stare, animal.sosire, animal.plecare,animal.nume,animal.data_nasterii,animal.gen,boala.tip,tratament.zona,tratament.durata,tratament.pret
                            FROM animal join sufera on animal.id_animal = sufera.id_animal
                            JOIN boala on boala.id_boala = sufera.id_boala
                            join foloseste on animal.id_animal = foloseste.id_animal
                            join tratament on tratament.id_tratament = foloseste.id_tratament
                            ";
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
                                    $id_animal = $row['id_animal'];
                                    $nume = $row['nume'];
                                    $specie=$row['specie'];
                                    $stare=$row['stare'];
                                    $boala=$row['tip'];
                                    $data_nasterii=$row['data_nasterii'];
                                    $gen=$row['gen'];
                                    $sosire=$row['sosire'];
                                    $plecare=$row['plecare'];
                                    $zona=$row['zona'];
                                    $durata=$row['durata'];
                                    $pret=$row['pret'];
                                    
                                    ?>

                                <tr>
                                    <td><?php echo $id_animal;?></td>
                                    <td><?php echo $nume;?></td>
                                    <td><?php echo $specie;?></td>
                                    <td><?php echo $data_nasterii;?></td>
                                    <td><?php echo $gen;?></td>
                                    <td><?php echo $stare;?></td>
                                    <td><?php echo $boala;?></td>
                                    <td><?php echo $zona;?></td>
                                    <td><?php echo $durata;?></td>
                                    <td><?php echo $pret;?></td>
                                    <td><?php echo $sosire;?></td>
                                    <td><?php echo $plecare;?></td>
                                    <td>
                                        
                                        <a href="<?php echo SITEURL ;?>admin/update_animal.bolnav.php?id_animal=<?php echo $id_animal;?>" class="addbutton">UPDATE ANIMAL</a>
                                        <a href="<?php echo SITEURL ;?>admin/delete.animal.bolnav.php?id_animal=<?php echo $id_animal;?>" class="deletebutton">DELETE ANIMAL</a>
                                    </td>
                                </tr>


                                    <?php


                                }

                            }else{
                                //we do not have data
                                //we'll display the message
                                ?>

                                <tr>
                                    <td colspan="6"><divc lass = "error">Nu au fost adaugate animale</div></td>
                                </tr>

                                <?php
                            }
                    
                    ?>


                </table>
            </div>
        </div>
<?php include('bits/footer.php')?>