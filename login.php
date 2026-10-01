<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    <head>

    <body>
        <form action="processlogin.php" method ="POST">
            Email:<input type="text" name="email"><br>
            Password:<input type="password" name="password"><br>
            <input type="submit" value="submit">
        </form>
            <?php
                session_start();
                if(isset($_SESSION["logged_in_status"])){
                    echo("<br>");
                    echo($_SESSION["logged_in_status"]);
                    session_destroy();
                }
                if (isset($_SESSION['Password/User/Incorrect'])) {
                    echo("<br>Email or password is incorrect.");
                    unset($_SESSION['Password/User/Incorrect']);
                }

            ?>
        <br>
        <a href="signup.php">Havent got a account? Click here to signup </a> 
    </body>
</html>
