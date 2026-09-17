<?php
    session_start();
    include_once("connection.php");
    #starts the session and connects the code to the database.

    $allergenLen = strlen($_POST["allergy"]);
    if($allergenLen > 100){
        $_SESSION['message'] = "This exceeds the character limit.";
        header('location: addallergen.php');
    }
    
    $stmt1= $conn->prepare("SELECT * FROM tblallergen");
    $stmt1->execute(); 
    while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        /* Use if statements to check if the user has entered the same food as one in the database */
        /* makes the input and the data from database both uppercase so that the casing doesnt matter when entered */
        if (strtoupper($_POST["allergy"])==strtoupper($row["Allergy"])){
            $foundAllergy=True;
        }
    }

    if($foundAllergy){
        $_SESSION['message'] = "Allergy type has already been added.";
        header('location: addallergen.php');
    }
    else{
        $stmt1= $conn->prepare("INSERT INTO tblallergen
        (AllergenID,Allergy)
        VALUES
        (NULL,:Allergy)
        ");
        # SQL statement to insert into the table menu

        $stmt1->bindParam(":Allergy",$_POST["allergy"]);
        $stmt1->execute();
        $_SESSION['message'] = "allergen has successfully been added.";
        header('location: addallergen.php');
    }

?>
