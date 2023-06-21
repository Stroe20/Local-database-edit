<?php include('bits/menu.php')?>

    <div class="main">
        <div class="wrapper">
            <h1>Adauga tratament</h1>
            
            <br><br>

            <?php
            
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }


            ?>

            <br><br>
            <!--Form start-->
            <form action="" method="POST" enctype="multipart/form-data">

                <table class="table-30">
                    <tr>
                        <td>ID_Boala: </td>
                        <td>
                            <input type="text" name="id_boala" placeholder="ID_Boala ">
                        </td>
                    </tr>
                    <tr>
                        <td>Tip: </td>
                        <td>
                            <input type="text" name="tip" placeholder="Tip tratament">
                        </td>
                    </tr>
                    <tr>
                        <td>Zona afectata: </td>
                        <td>
                            <input type="text" name="zona" placeholder="Zona afectata">
                        </td>
                    </tr>
                    <tr>
                        <td>Durata(zile): </td>
                        <td>
                            <input type="text" name="durata" placeholder="Durata(zile)">
                        </td>
                    </tr>
                    <tr>
                        <td>Pret(ron): </td>
                        <td>
                            <input type="text" name="pret" placeholder="Pret(ron)">
                        </td>
                    </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Adauga Tratament" class="addbutton">
                    </td>
                </tr>
                </table>
            </form>
            <!--Form end-->
            <?php 
            
            //check if submit button is clicked
            if(isset($_POST['submit']))
            {
                //echo "clicked";
                //1. get value from  form
                 $id_boala=$_POST['id_boala'];
                 $tip=$_POST['tip'];
                 $zona=$_POST['zona'];
                 $durata=$_POST['durata'];
                 $pret=$_POST['pret'];



                 //2. create sql query to insert into  database
                 $sql="INSERT INTO tratament SET
                 id_boala='$id_boala',
                 tip='$tip',
                 zona='$zona',
                 durata='$durata',
                 pret='$pret'

                 ";
                 //3. execute query
                 $res = mysqli_query($conn,$sql);

                 //4.Check if the query  executed
                 if($res==TRUE)
                 {
                    //query executed and data added
                    $_SESSION['add']="<div class='success'>Tratament adaugat cu succes</div>";
                    //redirect to manage tratament page
                    header('location:'.SITEURL.'admin/manage.tratament.php');
                 }else{
                    //failed to add
                    $_SESSION['add']="<div class='error'>Tratamentul nu a fost adaugat</div>";
                    //redirect to add tratament page
                    header('location:'.SITEURL.'admin/add.tratament.php');
                 }
            
            }
            
            ?>
        </div>
    </div>

<?php include('bits/footer.php')?>