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
                    $sql="SELECT * FROM animal WHERE id_animal=$id_animal";
                    $res = mysqli_query($conn,$sql);
                    $count =mysqli_num_rows($res);

                    if($count==1)
                    {
                        //get data
                        $row = mysqli_fetch_assoc($res);
                        $specie = $row['specie'];
                        $nume = $row['nume'];
                        $stare = $row['stare'];
                        $data_nasterii = $row['data_nasterii'];
                        $gen = $row['gen'];
                        $sosire = $row['sosire'];
                        $plecare = $row['plecare'];

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
                            $id=$_POST['id'];
                            $nume=$_POST['nume'];
                            $specie=$_POST['specie'];
                            $stare=$_POST['stare'];
                            $data_nasterii=$_POST['data_nasterii'];
                            $gen=$_POST['gen'];
                            $sosire=$_POST['sosire'];
                            $plecare=$_POST['plecare'];
                        
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
                            //4.redirect
                            if($res2==true){
                                //database updated
                                $_SESSION['update']="<div class='success'>Animal updated successfully</div>";
                                header('location:'.SITEURL.'admin/manage.animal.php');
                            }else{
                                //failed to update animal
                                $_SESSION['update']="<div class='error'>Failed to update</div>";
                                header('location:'.SITEURL.'admin/manage.animal.php');
                            }
                            
                        }
                    
                    ?>

             </div>
</div>



<?php include('bits/footer.php')?>