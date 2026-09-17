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
        <title>Add allergen</title>
    <head>
    <body>
        <!-- allows the admin to enter the food data and submit it to the database. -->
        <form action="addallergendatabase.php" method="post">
            Allergy: <input type ="text" name="allergy"><br>
        <input type="submit" value="submit">
        <br>
        <?php
        if(isset($_SESSION['message'])){
            echo($_SESSION['message']);
            unset($_SESSION['message']);
        }
        ?>
        </form>
    </body>
</html>

