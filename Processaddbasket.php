<?php
session_start();
include_once("connection.php");
if (!isset($_SESSION["loggedinuser"])){
    header('location: login.php');
}
print_r($_POST["Order"]);
echo("<br>");
$UserID = $_SESSION["loggedinuser"];
$FoodID = $_POST["Order"][0];
$Requests = $_POST["Order"][1];
$Requests = $_POST["Order"][2];
if(isset($_POST["Order"])){
    echo("before SQL");
    $stmt1= $conn->prepare("INSERT INTO tblbasket
    (orderID,UserID,FoodID,requests,Quantity)
    VALUES
    (NULL,:UserID,:FoodID,:requests,:Quantity)
    ");
    $stmt1->bindParam(":UserID",$UserID);
    $stmt1->bindParam(":FoodID",$FoodID);
    $stmt1->bindParam(":requests",$Requests);
    $stmt1->bindParam(":Quantity",$Quantity);
    $stmt1->execute();
    echo("After SQL");
    unset($_POST["Order"]);
    header('location: mainpage.php');
}
else{
    header('location: mainpage.php');
}
?>