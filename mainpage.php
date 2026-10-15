<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>My PHP Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <?php
    include_once('navbar.php');
  ?>

  <h1 class = "Rice"> Rice dishes</h1>
    <img src="Photos\Yang_Zhou_Fried_Rice.webp">
    <br>
    <form action="addtobasket.php" method="post">
    <select name="Order" id="Order">Dish:
      
      <?php
      session_start();
      include_once("connection.php");
      $stmt1= $conn->prepare("SELECT * FROM tblmenu WHERE foodType = 'rice'");
      $stmt1->execute();
      while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
        echo('<option value='.$row["Name"].'>'.$row["Name"].'</option>');
      }

      ?>
    </select>

    <h2 class ="Pork_Dishes">Pork dishes</h2>
    <img src="Photos\Bruised_Pork.webp">
    <br>
    <form action="addtobasket.php" method="post">
      <select name="Order" id="Order">Dish:
      <?php
      session_start();
      include_once("connection.php");
      $stmt1= $conn->prepare("SELECT * FROM tblmenu WHERE foodType = 'pork'");
      $stmt1->execute();
      while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
        echo('<option value='.$row["Name"].'>'.$row["Name"].'</option>');
      }

      ?>
      </select>
    </form>
</html>
