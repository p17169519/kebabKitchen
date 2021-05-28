<?php
  include '../db.php';
  $id = $_POST['id'];
  $type_id = $_POST["type_id"];
  $foodName = $_POST["foodName"];
  $price = $_POST["price"];
  $description = $_POST["description"];
  $sql = "UPDATE fooditemtbl SET type_id='$type_id', foodName='$foodName', price='$price', description='$description'
  WHERE id=$id";
  $result = $conn->query($sql);
  $conn->close();
  header("location: admin.php");
