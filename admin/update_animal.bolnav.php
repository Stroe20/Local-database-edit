<?php include('bits/menu.php')?>
<div class="main">
             <div class="wrapper">
                <h1>Update animal</h1>
                <br /><br />

                <?php
                
                //check  if id is check
                if(isset($_GET['id_animal'])){
                    //get details
                    $id_animal=$_GET['id_animal'];
                    $sql="select animal.id_animal,animal.specie, animal.stare, animal.sosire, animal.plecare,animal.nume,
                    animal.data_nasterii,animal.gen,boala.tip,
                    tratament.zona,tratament.durata,tratament.pret
                    FROM animal join sufera on animal.id_animal = sufera.id_animal
                    JOIN boala on boala.id_boala = sufera.id_boala
                    join foloseste on animal.id_animal = foloseste.id_animal
                    join tratament on tratament.id_tratament = foloseste.id_tratament
                    WHERE animal.id_animal=$id_animal";
                    $res = mysqli_query($conn,$sql);
                    $count =mysqli_num_rows($res);

                    if($count==1)
                    {
                        //get data
                        $row = mysqli_fetch_assoc($res);
                        $id_animal = $row['id_animal'];
                        $nume = $row['nume'];
                        $specie=$row['specie'];
                        $stare=$row['stare'];
                        $tip=$row['tip'];
                        $data_nasterii=$row['data_nasterii'];
                        $gen=$row['gen'];
                        $sosire=$row['sosire'];
                        $plecare=$row['plecare'];
                        $zona=$row['zona'];
                        $durata=$row['durata'];
                        $pret=$row['pret'];

                    }else{
                        //redirect with message
                        $_SESSION['no_animal_found']="<div class='error'>Animal not found</div>";
                        header('location:'.SITEURL.'admin/manage.animal.php');
                    }
                }else{
                    //redirect
                    header('location:'.SITEURL.'admin/manage.animal.php');
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
                            <td>Specie: </td>
                            <td>
                                <input type="text" name="specie" value="<?php echo $specie;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Stare: </td>
                            <td>
                                <input type="text" name="stare" value="<?php echo $stare;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Boala: </td>
                            <td>
                                <input type="text" name="tip" value="<?php echo $tip;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Data nasterii: </td>
                            <td>
                                <input type="date" name="data_nasterii" value="<?php echo $data_nasterii;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Gen: </td>
                            <td>
                                <input type="text" name="gen" value="<?php echo $gen;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Data sosirii: </td>
                            <td>
                                <input type="date" name="sosire" value="<?php echo $sosire;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Data plecarii: </td>
                            <td>
                                <input type="date" name="plecare" value="<?php echo $plecare;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Zona afectata: </td>
                            <td>
                                <input type="text" name="zona" value="<?php echo $zona;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Durata tratament(zile): </td>
                            <td>
                                <input type="text" name="durata" value="<?php echo $durata;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Pret(RON): </td>
                            <td>
                                <input type="text" name="pret" value="<?php echo $pret;?>">
                            </td>
                        </tr>

                        <tr>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="UPDATE ANIMAL" class="addbutton">
                        </td>
                        </tr>
                    </table>
                </form>

                    <?php
                    
                        if(isset($_POST['submit'])){
                            //echo "clicked";
                            //1.get values
                            $nume = $_POST['nume'];
                            $specie=$_POST['specie'];
                            $stare=$_POST['stare'];
                            $tip=$_POST['tip'];
                            $data_nasterii=$_POST['data_nasterii'];
                            $gen=$_POST['gen'];
                            $sosire=$_POST['sosire'];
                            $plecare=$_POST['plecare'];
                            $zona=$_POST['zona'];
                            $durata=$_POST['durata'];
                            $pret=$_POST['pret'];
                        
                            //3.update database
                            $sql2="UPDATE animal SET
                            specie='$specie',
                            nume='$nume',
                            stare='$stare',
                            data_nasterii='$data_nasterii',
                            gen='$gen',
                            sosire='$sosire',
                            plecare='$plecare'
                            WHERE id_animal=$id_animal
                            ";
                            $res2 = mysqli_query($conn,$sql2);
                            //update sufera
                            $sql3="UPDATE sufera
                            SET id_boala = (
                              SELECT boala.id_boala
                              FROM boala
                              WHERE boala.tip = '$tip'
                            )
                            WHERE id_animal IN (
                              SELECT animal.id_animal
                              FROM animal
                              JOIN sufera ON animal.id_animal = sufera.id_animal
                              JOIN boala ON boala.id_boala = sufera.id_boala
                              JOIN foloseste ON animal.id_animal = foloseste.id_animal
                              JOIN tratament ON tratament.id_tratament = foloseste.id_tratament
                              WHERE animal.id_animal = '$id_animal')
                            ";
                            $res3 = mysqli_query($conn,$sql3);
                            //update tratament
                            $sql4="UPDATE tratament
                            SET id_boala = (
                              SELECT boala.id_boala
                              FROM boala
                              WHERE boala.tip = '$tip'
                            ),
                            zona = '$zona',
                            durata = '$durata',
                            pret = '$pret'
                            WHERE id_tratament IN (
                              SELECT foloseste.id_tratament
                              FROM foloseste
                              JOIN tratament ON tratament.id_tratament = foloseste.id_tratament
                              JOIN sufera ON sufera.id_animal = foloseste.id_animal
                              JOIN boala ON boala.id_boala = sufera.id_boala
                              JOIN animal ON animal.id_animal = sufera.id_animal
                              WHERE animal.id_animal = '$id_animal'
                            );";
                            $res4 = mysqli_query($conn,$sql4);
                            //4.redirect
                            if($res2==true && $res3==true && $res4==true){
                                //database updated
                                $_SESSION['update']="<div class='success'>Animal updated successfully  </div>";
                                header('location:'.SITEURL.'admin/manage.animal.bolnav.php');
                            }else{
                                //failed to update animal
                                $_SESSION['update']="<div class='error'>Failed to update</div>";
                                header('location:'.SITEURL.'admin/manage.animal.bolnav.php');
                            }
                            
                        }
                    
                    ?>

             </div>
</div>



<?php include('bits/footer.php')?>