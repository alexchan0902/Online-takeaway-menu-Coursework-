<?php
    session_start();
    include_once("connection.php");
    #starts the session and connects the code to the database.
    $stmt1= $conn->prepare("SELECT * FROM tblmenu");
    $stmt1->execute();

    // This code uses a while loop to take the values out of the database to use later
    while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        /* Use if statements to check if the user has entered the same food as one in the database */
        if ($_POST["foodname"]==$row["Name"]){
            $foundFood=True;
        }
    }

    if ($foundFood) {
        $_SESSION['error'] = "The food has already been added to the database.";
        header('location: addfood.php');
    }
    elseif ($foundFood != True){
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
        $_SESSION['foodAdded'] = true;
        header('location: addfood.php');
    }

?>
