<?php
    //header("location: index.php")
    session_start();#start session if you want to use session variables
    print_r($_POST);
    array_map ("htmlspecialchars",$_POST);
    include_once("connection.php");
    $stmt1= $conn->prepare("SELECT * FROM tblusers WHERE Email=:Email" );
    $stmt1->bindParam(":Email",$_POST["email"]);
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        $hashed=$row["Password"];
        $attempt=$_POST["password"];
        if (password_verify($attempt,$hashed)){
            echo("valid password");
            $_SESSION["firstname"]=$row["Forename"];
            $_SESSION["loggedinuser"]=$row["UserID"];
            $_SESSION["role"]=$row["Role"];  
            if ($_SESSION["role"] == "1" ){
                header('location: adminpage.php');  
            }  
            else{
                header('location: mainpage.php');
            }
        }
        else{
            echo("Invalid password");
        }
    }
?>