<?php
session_start();
include_once("connection.php");
echo($_POST["Order"]);
echo("<br>");
if(isset($_POST["Order"])){
    echo("before SQL");
    $stmt1= $conn->prepare("INSERT INTO tblbasket
    (orderID,UserID,foodID,requests,Quantity)
    VALUES
    (NULL,:UserID,:foodID,:requests,:Quantity)
    ");
    $stmt1->bindParam(":UserID",$_SESSION["loggedinuser"]);
    $stmt1->bindParam(":FoodID",$_POST["Order"]);
    $stmt1->bindParam(":requests",$_POST["Requests"]);
    $stmt1->bindParam(":Quantity",$_POST["Quantity"]);
    $stmt1->execute();
    echo("After SQL");
    unset($_POST["Order"]);
    unset($_POST["Requests"]);
    unset($_POST["Quantity"]);
    header('location: mainpage.php');
}
else{
    header('location: mainpage.php');
}
?>