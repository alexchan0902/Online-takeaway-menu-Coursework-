<!DOCTYPE html>
<html>
    <head>
        <title>Add users</title>
        <script type="text/javascript">
            // This code checks if the radio button has been checked or not. check if the admin radio button has been checked
            function adminCheck() {
                if (document.getElementById("adminbutton").checked) {
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
            Role:
            <input type ="radio" onclick="javascript:adminCheck();" name="role" value="pupil" >User
            <input type ="radio" onclick="javascript:adminCheck();" name="role" value="admin" id="adminbutton">Admin<br>
            
            <div id="adminpassword" style="visibility:hidden">
                admin Password: <input id = "adminpassword" type ="password" name="adminpassword"><br>
            </div>
            <input type="submit" value="submit" >
        </form>
        <?php
            include_once("connection.php");
            $stmt1= $conn->prepare("SELECT * FROM tblusers");
            $stmt1->execute();
            while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
            {
                echo($row["firstname"]." "."<br>".$row["lastname"]."<br>");
            }
            ?>
    </body>
</html>
