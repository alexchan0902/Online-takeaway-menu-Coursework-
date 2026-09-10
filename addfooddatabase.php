<?php
    session_start();
    include_once("connection.php");
    #starts the session and connects the code to the database.

    $stmt1= $conn->prepare("INSERT INTO tblmenu
    (FoodID,Name,AllergenID,Price)
    VALUES
    (NULL,:Name,:AllergenID,:Price)
    ");
    # SQL statement to insert into the table menu

    $stmt1->bindParam(":Name",$_POST["foodname"]);
    $stmt1->bindParam(":AllergenID",$_POST["allergenID"]);
    $stmt1->bindParam(":Price",$_POST["price"]);
    $stmt1->execute();
?>
