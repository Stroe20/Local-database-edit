<?php include('bits/menu.php')?>

    <div class="main">
        <div class="wrapper">
            <h1>Adauga angajat</h1>
            
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
                            <input type="text" name="nume" placeholder="Nume angajat">
                        </td>
                    </tr>
                    <tr>
                        <td>Prenume: </td>
                        <td>
                            <input type="text" name="prenume" placeholder="Prenume angajat">
                        </td>
                    </tr>
                    <tr>
                        <td>Specializare: </td>
                        <td>
                            <input type="text" name="specializare" placeholder="Specializare angajat">
                        </td>
                    </tr>
                    <tr>
                        <td>Data nasterii: </td>
                        <td>
                            <input type="date" name="data_nasterii" placeholder="Data nasterii">
                        </td>
                    </tr>
                    <tr>
                        <td>Telefon: </td>
                        <td>
                            <input type="text" name="telefon" placeholder="Telefon angajat">
                        </td>
                    </tr>
                    <tr>
                        <td>E-mail: </td>
                        <td>
                            <input type="text" name="email" placeholder="E-mail angajat">
                        </td>
                    </tr>
                    <tr>
                        <td>Salariu: </td>
                        <td>
                            <input type="text" name="salariu" placeholder="salariu angajat">
                        </td>
                    </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Adauga Angajat" class="addbutton">
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
                //1. get value from angajat form
                 $nume=$_POST['nume'];
                 $prenume=$_POST['prenume'];
                 $specializare=$_POST['specializare'];
                 $data_nasterii=$_POST['data_nasterii'];
                 $telefon=$_POST['telefon'];
                 $email=$_POST['email'];
                 $salariu=$_POST['salariu'];



                 //2. create sql query to insert into angajat database
                 $sql="INSERT INTO angajat SET
                 nume='$nume',
                 prenume='$prenume',
                 specializare='$specializare',
                 data_nasterii='$data_nasterii',
                 tel='$telefon',
                 email='$email',
                 salariu='$salariu'

                 ";
                 //3. execute query
                 $res = mysqli_query($conn,$sql);

                 //4.Check if the query  executed
                 if($res==TRUE)
                 {
                    //query executed and data added
                    $_SESSION['add']="<div class='success'>Angajat adaugat cu succes</div>";
                    //redirect to manage cat page
                    header('location:'.SITEURL.'admin/manage.angajat.php');
                 }else{
                    //failed to add
                    $_SESSION['add']="<div class='error'>Angajatul nu a fost adaugat</div>";
                    //redirect to add angajat page
                    header('location:'.SITEURL.'admin/add_angajat.php');
                 }
            
            }
            
            ?>
        </div>
    </div>

<?php include('bits/footer.php')?>