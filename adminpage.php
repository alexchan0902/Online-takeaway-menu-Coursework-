<?php
    session_start();
    if ($_SESSION["role"]!= "1"){
        header('location: mainpage.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin page</title>
    <head>

    <body>
        <a href="addfood.php"> Add new food items. </a> 
        <br>
        <a href="addallergen.php"> Add new allergens. </a>
    </body>
</html>