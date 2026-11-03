<?php
session_start();
include_once("connection.php");
if(isset($_POST["Order"])){
    $stmt1= $conn->prepare("INSERT INTO tblbasket (UserID, FoodName) VALUES (:UserID, :FoodName)");
    $stmt1->bindParam(":UserID",$_SESSION["loggedinuser"]);
    $stmt1->bindParam(":FoodName",$_POST["Order"]);
    $stmt1->execute();
    header('location: mainpage.php');
}
else{
    header('location: mainpage.php');
}
?>