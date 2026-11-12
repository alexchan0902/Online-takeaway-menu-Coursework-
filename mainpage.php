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
    <!-- Put an image of one of the dishes in so the users know what kind of dish they are ordering -->
    <img src="Photos\Yang_Zhou_Fried_Rice.webp">
    <br>
    <form action="Processaddbasket.php" method="post">
      Dish:
        <!-- Use of php to take all the values out of tblmenu and check if they are the correct food type. If it is then
        take it out of the table and show it on a dropdown list -->
      <select name="Order" id="Order">
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
      requests:
      <input name="Requests" id="Requests"> </input>
      <!-- Allows the user to enter the number of the specific item they want. -->
      Quantity:
      <input type = "number" name="Quantity" id="Quantity" min ="1"max ="99"value="1"step="1"size="1">
      <!-- Makes the button so user can submit values into database -->
      <input type="submit" value="add to basket">
    </form>

    <h2 class ="Pork_Dishes">Pork dishes</h2>
    <img src="Photos\Bruised_Pork.webp">
    <br>
    <form action="Processaddbasket.php" method="post">
      <select name="Order" id="Order">Dish:
      <?php
      $stmt1= $conn->prepare("SELECT * FROM tblmenu WHERE foodType = 'pork'");
      $stmt1->execute();
      while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
        echo('<option value='.$row["Name"].'>'.$row["Name"].'</option>');
      }
    ?>
      </select>
    </form>
    
    <h2 class="Chicken_dishes">Chicken dishes </h2>
    <img src="Photos\Honeylemonchicken.webp">
    <br>
    <form action="Processaddbasket.php" method="post">
      <select name="Order" id="Order">Dish:
      <?php
      $stmt1= $conn->prepare("SELECT * FROM tblmenu WHERE foodType = 'chicken'");
      $stmt1->execute();
      while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
        echo('<option value='.$row["Name"].'>'.$row["Name"].'</option>');
      }
    ?>

    <h2 class="Dessert">Dessert</h2>
    <img src="Photos\Eggtart.webp">
    <br>
    <form action="Processaddbasket.php" method="post">
      <select name="Order" id="Order">Dish:
      <?php
      $stmt1= $conn->prepare("SELECT * FROM tblmenu WHERE foodType = 'dessert'");
      $stmt1->execute();
      while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
        echo('<option value='.$row["Name"].'>'.$row["Name"].'</option>');
      }
      ?>
</html>
