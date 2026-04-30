<!DOCTYPE html>
<html>
    <head>
        <title>Add users</title>
        <script type="text/javascript">

            function adminCheck() {
                if (document.getElementById("role").checked) {
                    document.getElementById("adminpassword").style.visibility = "visible";
                } else {
                    document.getElementById("adminpassword").style.visibility = "hidden";
                }
            }
        </script>
    <head>

    <body>
        <form action="addusers.php" method="post">
            firstname: <input type ="text" name="firstname"><br>
            lastname: <input type ="text" name="lastname"><br>
            email: <input type="text" name="email"><br>
            contact: <input type="text" name="contact"><br>
            Password: <input type ="password" name="password"><br>
            <?php /*

                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $selectedOption = $_POST["admin"]?? null;
                    $password = $_POST['password']?? "";
                    if (empty($password)){
                        $error = "Password is required.";
                    }
                    elseif ($password != $correctPassword) {
                        $error = "Password is incorrect.";
                    }
                }*/
            ?>
            
            Role:
            <input type ="radio" onclick="javascript:adminCheck();" name="role" value="pupil" >User
            <input type ="radio" onclick="javascript:adminCheck();" name="role" value="admin" >Admin<br>
            
            <div id="adminpassword" style="visibility:hidden">
                admin Password: <input id = "adminpassword" type ="password" name="adminpassword" style="visibility:hidden"><br>
            </div>
            <?php
                $correctPassword = "192834543";
                    if($_POST["role"]=="admin"){
                        
                    }else{
                        echo("hi");
                    }
            ?>
        </form>
        <?php
            include_once("connection.php");
            $stmt1= $conn->prepare("SELECT * FROM tblusers");
            $stmt1->execute();
            while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
            {
                echo($row["Forename"]." "."<br>".$row["Surname"]."<br>");
            }
            ?>
    </body>
</html>