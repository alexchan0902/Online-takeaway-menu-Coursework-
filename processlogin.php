<?php    
    //header("location: index.php")
    session_start();#start session if you want to use session variables
    print_r($_POST);
    include_once("connection.php");
    $stmt1= $conn->prepare("SELECT * FROM tblusers WHERE Email=:Email" );
    $stmt1->bindParam(":Email",$_POST["email"]);
    $stmt1->execute();
    while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
                $hashed=$row["Password"];
                if (password_verify($_POST["password"],$hashed)){
                    echo("valid password");
                    $_SESSION["firstname"]=$row["Forename"];
                    $_SESSION["loggedinuser"]=$row["UserID"];
                    $_SESSION["role"]=$row["Role"];  
                    $_SESSION["logged_in_status"] = True;
                    if ($_SESSION["role"] == "1" ){
                        header('location: adminpage.php');  
                    }  
                    else{
                        header('location: mainpage.php');
                    }
                }     
        }
    // if (!$_SESSION["logged_in_status"]){
    // $_SESSION["Password/User/Incorrect"] = true;
    // header('location: login.php');
    // }

?>