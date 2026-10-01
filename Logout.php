<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
    <head>

    <body>

            <?php

                session_start();
                $_SESSION["logged_in_status"] = "You have been logged out successfully.";
                header("location: login.php");
            ?>

    </body>
</html>