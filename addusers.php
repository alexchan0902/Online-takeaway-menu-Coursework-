<?php
    //start a session so I can display a error message back onto the previous page if needed
    session_start();
    //Create a session variable called error so I can put the error message into it
    $_SESSION["error"]="";
    //print_r($_POST);
    //Connect to database
    include_once("connection.php");
    /*Use if statement to check if the selected role is admin, if it is then check the password,
    if password is incorrect then it takes user back to the previous signup page.*/
    if($_POST["role"]=="admin"){
        $correctPassword = "192834543";
            if($_POST["role"]=="admin"){
                if ($_POST["adminpassword"] == $correctPassword){
                    echo"password correct";
                    $role=1;
                }
                else{
                    $_SESSION["error"]="admin password is incorrect";
                    header('Location: signup.php');
                }
            }                    
    }
    // Make role = 0 if the person chose "user"
    if($_POST["role"]=="user"){
        $role = 0;
    }
    // put the length of the string user entered into their respective variable.
    $firstNamelen = strlen($_POST["firstname"]);
    $lastNamelen = strlen($_POST["lastname"]);
    $emailLen = strlen($_POST["email"]);
    $contactLen = strlen($_POST["contact"]);
    $passwordLen = strlen($_POST["password"]);
    // use if statements to check if the string user entered are over the character limit from install file.
    if ($firstNamelen > 20){
        $_SESSION["error"] = "First name cannot be over 20 characters";
        header('location: signup.php');
    }
    elseif ($lastNamelen > 20){
        $_SESSION["error"] = "Last name cannot be over 20 characters";
        header('location: signup.php');
    }
    elseif ($emailLen > 40){
        $_SESSION["error"] = "Email cannot be over 40 characters";
        header('location: signup.php');
    }
    elseif ($contactLen > 11){
        $_SESSION["error"] = "UK phone number cannot be over 11 characters";
        header('location: signup.php');
    }
    elseif ($passwordLen > 200){
        $_SESSION["error"] = "Password cannot be over 200 characters";
        header('location: signup.php');
    }

    $foundConatct=False;
    $foundEmail=False;
    $stmt1= $conn->prepare("SELECT * FROM tblusers");
    $stmt1->execute();
    //echo($_POST["contact"]);
    //echo($_POST["email"]);

    // This code uses a while loop to take the values out of the database to use later
    while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        //echo($row["Contact"]);
        //echo($row["Email"]);

        /* Use if statements to check if the user has entered a same email or contact which is already 
         in database*/
        if ($_POST["contact"]==$row["Contact"]){
            $foundContact=True;
        }
        if($_POST["email"]==$row["Email"]){
            $foundEmail=True;
        }
    }

    /* If contact or email already in use, then change session variable to respective error,
    then take user back to signup page and display the error message. If the contact and emial are not
    in use, then insert the data from signup page into the database. */
    if ($foundContact == True and $foundEmail == True){
        $_SESSION["error"] = "Both contact and email are in use.";
        //header('Location: signup.php');
    }
    elseif ($foundContact==True){
        //set error session variable to a message to show the error
        $_SESSION["error"]="Contact is already in use";
        //header('Location: signup.php');
    }
    elseif ($foundEmail == True){
        $_SESSION["error"]="Email is already in use.";
        //header('location: signup.php');
    }
    else{
        $hashedpassword=password_hash($_POST["password"],PASSWORD_DEFAULT);
        $stmt1= $conn->prepare("INSERT INTO tblusers
        (UserID,firstname, lastname, Email, Contact, Password, Role)
        VALUES
        (NULL, :firstname, :lastname, :email, :contact, :password, :Role)
        ");
        $stmt1->bindParam(":firstname",$_POST["firstname"]);
        //echo"firstname done";
        $stmt1->bindParam(":lastname",$_POST["lastname"]);
        //echo"secondname done";
        $stmt1->bindParam(":email",$_POST["email"]);
        //echo"email done";
        $stmt1->bindParam(":contact",$_POST["contact"]);
        //echo " contact done";
        $stmt1->bindParam(":password",$hashedpassword);
        //echo"password done ";
        $stmt1->bindParam(":Role",$role);
        //echo"role done";
        $stmt1->execute();
    }


?>

