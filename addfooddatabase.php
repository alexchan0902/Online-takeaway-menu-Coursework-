<?php
$stmt1= $conn->prepare("SELECT * FROM tblusers");
    $stmt1->execute();

    // This code uses a while loop to take the values out of the database to use later
    /* while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
         Use if statements to check if the user has entered a same email or contact which is already 
         in database
        if ($_POST["contact"]==$row["Contact"]){
            $foundContact=True;
        }
        if($_POST["email"]==$row["Email"]){
            $foundEmail=True;
        }
    }  */
    $hashedpassword=password_hash($_POST["password"],PASSWORD_DEFAULT);
    $stmt1= $conn->prepare("INSERT INTO tblusers
    (FoodID,Name,AllergenID,Price)
    VALUES
    (NULL,:Name,:AllergenID,:Price)
    ");
    $stmt1->bindParam(":Name",$_POST["foodname"]);
    $stmt1->bindParam(":AllergenID",$_POST["allergenID"]);
    $stmt1->bindParam(":Price",$_POST["price"]);
    $stmt1->execute();
?>