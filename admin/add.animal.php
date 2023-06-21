<?php include('bits/menu.php')?>

    <div class="main">
        <div class="wrapper">
            <h1>Adauga animal</h1>
            
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
                        <td>Nume: </td>
                        <td>
                            <input type="text" name="nume" placeholder="Nume animal">
                        </td>
                    </tr>
                    <tr>
                        <td>Specie: </td>
                        <td>
                            <input type="text" name="specie" placeholder="Specie animal">
                        </td>
                    </tr>
                    <tr>
                        <td>Stare: </td>
                        <td>
                            <input type="text" name="stare" placeholder="Stare animal">
                        </td>
                    </tr>
                    <tr>
                        <td>Data nasterii: </td>
                        <td>
                            <input type="date" name="data_nasterii" placeholder="Data nasterii">
                        </td>
                    </tr>
                    <tr>
                        <td>Gen: </td>
                        <td>
                            <input type="text" name="gen" placeholder="Gen animal">
                        </td>
                    </tr>
                    <tr>
                        <td>Data sosirii: </td>
                        <td>
                            <input type="date" name="sosire" placeholder="Data sosirii">
                        </td>
                    </tr>
                    <tr>
                        <td>Data plecarii: </td>
                        <td>
                            <input type="date" name="plecare" placeholder="Data plecarii">
                        </td>
                    </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Adauga Animal" class="addbutton">
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
                //1. get value from animal form
                 $nume=$_POST['nume'];
                 $specie=$_POST['specie'];
                 $stare=$_POST['stare'];
                 $data_nasterii=$_POST['data_nasterii'];
                 $gen=$_POST['gen'];
                 $sosire=$_POST['sosire'];
                 $plecare=$_POST['plecare'];



                 //2. create sql query to insert into  database
                 $sql="INSERT INTO animal SET
                 nume='$nume',
                 specie='$specie',
                 stare='$stare',
                 data_nasterii='$data_nasterii',
                 gen='$gen',
                 sosire='$sosire',
                 plecare='$plecare'

                 ";
                 //3. execute query
                 $res = mysqli_query($conn,$sql);

                 //4.Check if the query  executed
                 if($res==TRUE)
                 {
                    //query executed and data added
                    $_SESSION['add']="<div class='success'>Animal adaugat cu succes</div>";
                    //redirect to manage cat page
                    header('location:'.SITEURL.'admin/manage.animal.php');
                 }else{
                    //failed to add
                    $_SESSION['add']="<div class='error'>Animalul nu a fost adaugat</div>";
                    //redirect to add animal page
                    header('location:'.SITEURL.'admin/add.animal.php');
                 }
            
            }
            
            ?>
        </div>
    </div>

<?php include('bits/footer.php')?>