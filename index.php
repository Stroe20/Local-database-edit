<?php include('parts_front/menu.php');?>

<div class="main">
            <div class="wrapper">
                <h1>Cabinet</h1>
                <br /><br />


                <table class="table-full">
                    <tr>
                        <th>Adresa</th>
                        <th>Telefon</th>
                        <th>E-mail</th>
                        <th>Specialisti</th>
                        
                    </tr>


                    <?php
                    
                            //query to get all data from database
                            $sql = "SELECT
                            CONCAT('Judetul ', cabinet.judet, ', ', 'Localitatea ', cabinet.localitate, ', ', 'Strada ', cabinet.strada, ', ', 'Nr ', cabinet.nr) AS adresa,
                                tel,
                                email,
                                (SELECT GROUP_CONCAT(DISTINCT angajat.specializare SEPARATOR ', ') FROM angajat JOIN lucreaza ON angajat.id_angajat = lucreaza.id_angajat
                                 WHERE cabinet.id_cabinet = lucreaza.id_cabinet) AS specialisti

                            FROM
                                cabinet
                                GROUP BY cabinet.id_cabinet;
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
                                    $adresa=$row['adresa'];

                                    $tel=$row['tel'];
                                    $email=$row['email'];
                                    $specialisti=$row['specialisti'];
                                    
                                    
                                    ?>

                                <tr>
                                    <td><?php echo $adresa;?></td>
                                    <td><?php echo $tel;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $specialisti;?></td>

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
   <?php include('parts_front/footer.php');?>