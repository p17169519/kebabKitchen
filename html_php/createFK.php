<?php
  include '../db.php';
  $type_id = $_POST["type_id"];
  $foodName = $_POST["foodName"];
  $price = $_POST["price"];
  $description = $_POST["description"];
  $sql = "INSERT INTO  fooditemtbl (type_id, foodName, price, description)
  VALUES ('$type_id', '$foodName', '$price', '$description')";
  $conn->query($sql);
  $conn->close();
  header("location: admin.php");
