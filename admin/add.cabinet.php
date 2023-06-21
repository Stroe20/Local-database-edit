<?php include('bits/menu.php')?>

    <div class="main">
        <div class="wrapper">
            <h1>Adauga cabinet</h1>
            
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
                        <td>Judet: </td>
                        <td>
                            <input type="text" name="judet" placeholder="Nume judet">
                        </td>
                    </tr>
                    <tr>
                        <td>Localitate: </td>
                        <td>
                            <input type="text" name="localitate" placeholder="Nume localitate">
                        </td>
                    </tr>
                    <tr>
                        <td>Strada: </td>
                        <td>
                            <input type="text" name="strada" placeholder="Nume strada">
                        </td>
                    </tr>
                    <tr>
                        <td>Nr: </td>
                        <td>
                            <input type="text" name="nr" placeholder="nr">
                        </td>
                    </tr>
                    <tr>
                        <td>Telefon: </td>
                        <td>
                            <input type="text" name="telefon" placeholder="Telefon cabinet">
                        </td>
                    </tr>
                    <tr>
                        <td>E-mail: </td>
                        <td>
                            <input type="text" name="email" placeholder="E-mail cabinet">
                        </td>
                    </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Adauga Cabinet" class="addbutton">
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
                //1. get value from cabinet form
                 $judet=$_POST['judet'];
                 $localitate=$_POST['localitate'];
                 $strada=$_POST['strada'];
                 $nr=$_POST['nr'];
                 $telefon=$_POST['telefon'];
                 $email=$_POST['email'];



                 //2. create sql query to insert into cabinet database
                 $sql="INSERT INTO cabinet SET
                 judet='$judet',
                 localitate='$localitate',
                 strada='$strada',
                 nr='$nr',
                 tel='$telefon',
                 email='$email'

                 ";
                 //3. execute query
                 $res = mysqli_query($conn,$sql);

                 //4.Check if the query  executed
                 if($res==TRUE)
                 {
                    //query executed and data added
                    $_SESSION['add']="<div class='success'>Cabinet adaugat cu succes</div>";
                    //redirect to manage cabinet page
                    header('location:'.SITEURL.'admin/manage.cabinet.php');
                 }else{
                    //failed to add
                    $_SESSION['add']="<div class='error'>Cabinetul nu a fost adaugat</div>";
                    //redirect to add  page
                    header('location:'.SITEURL.'admin/cabinet.php');
                 }
            
            }
            
            ?>
        </div>
    </div>

<?php include('bits/footer.php')?>