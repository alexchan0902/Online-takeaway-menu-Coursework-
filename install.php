<?php
    #create variables with server details
    $servername="localhost";
    $username="root";
    $password="root";

    // create database takeaway if it has not been created.
    $conn=new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="CREATE DATABASE IF NOT EXISTS Takeaway";
    $conn->exec($sql);
    $sql="USE Takeaway";
    $conn->exec($sql);
    echo("DB made");

    // create the table users and state the 
    $stmt1=$conn->prepare("DROP TABLE IF EXISTS tblusers;
    CREATE TABLE tblusers
    (UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(20) NOT NULL,
    lastName VARCHAR(20) NOT NULL,
    Email VARCHAR(40) NOT NULL,
    Contact VARCHAR(11) NOT NULL,
    Role TINYINT(1),
    Password VARCHAR(200) NOT NULL)
    ");
    echo("<br>Table users made.");
    $stmt1->execute();

    $hashedpassword=password_hash("Password",PASSWORD_DEFAULT);
    echo($hashedpassword);
    //add default data
    $stmt1=$conn->prepare("INSERT INTO tblusers
    (UserID,firstName,lastName,Email,Contact,Role,Password)
    VALUES
    (NULL,'Alex','Chan','abc@gmail.com' ,'9876543210','1',:Password),
    (NULL,'josh','a','cba@gmail.com','0123456789','0',:Password)
    ");
    $stmt1->bindParam(":Password",$hashedpassword);
    $stmt1->execute();

    // create a table for the menu
    $stmt1=$conn->prepare("DROP TABLE IF EXISTS tblmenu;
    CREATE TABLE tblmenu
    (FoodID INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30) NOT NULL,
    AllergenID INT(2) NOT NULL,
    Price Decimal(4,2) NOT NULL);
    ");
    echo("<br>Table menu made.");
    $stmt1->execute();

    // add default data
    $stmt1=$conn->prepare("INSERT INTO tblfood
    (FoodID,Name,AllergenID,Price)
    VALUES
    (NULL,'Bruised pork','3','10.99'),
    (NULL,'yang zhou fried rice','56','7.99')
    ");
    $stmt1->execute();

    // create the table for order
    $stmt1=$conn->prepare("DROP TABLE IF EXISTS tblorder;
    CREATE TABLE tblorder
    (orderID INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userID INT(4) NOT NULL,
    total Decimal(5,2) NOT NULL,
    payment BOOLEAN NOT NULL);
    ");
    echo("<br>Table order made.");
    $stmt1->execute();

    // add default data
    $stmt1=$conn->prepare("INSERT INTO tblorder
    (orderID,userID,total,Payment)
    VALUES
    (NULL,'1','20.50',true),
    (NULL,'2','30.00',false)
    ");
    $stmt1->execute();

    // create table for basket
    $stmt1=$conn->prepare("DROP TABLE IF EXISTS tblbasket;
    CREATE TABLE tblbasket
    (orderID INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FoodID INT(4) NOT NULL,
    requests Varchar(40) NOT NULL,
    Quantity INT(2) NOT NULL);
    ");
    echo("<br>Table basket made.");
    $stmt1->execute();

    // add default data
    $stmt1=$conn->prepare("INSERT INTO tblbasket
    (orderID,FoodID,requests,Quantity)
    VALUES
    ('1','1','No garlic','1'),
    ('2','2','No veggies','3')
    ");
    $stmt1->execute();    

    // create table for allergen
    $stmt1=$conn->prepare("DROP TABLE IF EXISTS tblallergen;
    CREATE TABLE tblallergen
    (AllergenID INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Allergy VARCHAR(100) NOT NULL);
    ");
    echo("<br>Table allergen made.");
    $stmt1->execute();

    // add default data 
    $stmt1=$conn->prepare("INSERT INTO tblallergen
    (AllergenID,Allergy)
    VALUES
    (NULL,'Egg'),
    (NULL,'Soy')
    ");
    $stmt1->execute();

    // create table for food that has allergen
    $stmt1=$conn->prepare("DROP TABLE IF EXISTS tblFood_has_allergen;
    CREATE TABLE tblFood_has_allergen
    (AllergenID INT(2) NOT NULL PRIMARY KEY,
    FoodID INT(3) NOT NULL);
    ");
    echo("<br>Table food_has_allergen made.");
    $stmt1->execute();

    // add default data
    $stmt1=$conn->prepare("INSERT INTO tblFood_has_allergen
    (AllergenID,FoodID)
    VALUES
    ('1','1'),
    ('2','2')
    ");
    $stmt1->execute();   
    echo("<br>Test data added.") 
    ?>




