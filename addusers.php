<?php
    print_r($_POST);
    include_once("connection.php");
    if($_POST["role"]=="admin"){
        $correctPassword = "192834543";
            if($_POST["role"]=="admin"){
                if ($_POST["adminpassword"] == $correctPassword){
                    echo"password correct";
                    $role=1;
                }
                else{
                header('Location: signup.php');
                }
            }
                        
        else{
            $role=0;
        }
    }

    $stmt1= $conn->prepare("INSERT INTO tblusers
    (UserID,firstname, lastname, Email, Contact, Password, Role)
    VALUES
    (NULL, :firstname, :lastname, :email, :contact, :password, :Role)
    ");
    $stmt1->bindParam(":firstname",$_POST["firstname"]);
    echo"firstname done";
    $stmt1->bindParam(":lastname",$_POST["lastname"]);
    echo"secondname done";
    $stmt1->bindParam(":email",$_POST["email"]);
    echo"email done";
    $stmt1->bindParam(":contact",$_POST["contact"]);
    echo " contact done";
    $stmt1->bindParam(":password",$_POST["password"]);
    echo"password done ";
    $stmt1->bindParam(":Role",$role);
    echo"role done";
    $stmt1->execute();
?>

