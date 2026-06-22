<?php
    // check if the user is an admin
    session_start();
    if ($_SESSION["role"]!= "1"){
        header('location: mainpage.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add food</title>
    <head>
    <body>
        <!-- allows the admin to enter the food data and submit it to the database. -->
        <form action="addfooddatabase.php" method="post">
            Foodname: <input type ="text" name="foodname"><br>
            AllergenID: <input type="text" name="allergenID"><br>
            price: <input type="text" name="price"><br>
            <input type="submit" value="submit">
        </form>
    </body>
</html>

