<?php   
        include ('../admin/secure/log.php');
        include ('bits/login_check.php');

?>


<html>
    <head>
        <title> Animal Cabinet Website - Home-Page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <!-- Menu section start-->

        <div class="menu text-center ">
            <div class="wrapper">
                <ul>
                    <li><a href="<?php echo SITEURL?>" class="myButton">Front Page</a></li>
                    <li><a href="index.php" class="myButton">Home</a></li>
                    <li><a href="manage.admin.php" class="myButton">Admin</a></li>
                    <li><a href="manage.angajat.php" class="myButton">Angajat</a></li>
                    <li><a href="manage.animal.php" class="myButton">Animal</a></li>
                    <li><a href="manage.boala.php" class="myButton">Boala</a></li>
                    <li><a href="manage.cabinet.php" class="myButton">Cabinet</a></li>
                    <li><a href="manage.tratament.php" class="myButton">Tratament</a></li>
                    <li><a href="logout.php" class="myButton">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu section end-->