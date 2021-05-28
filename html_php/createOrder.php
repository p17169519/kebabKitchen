<?php
  include '../db.php';
  $product_id = $_POST["product_id"];
  $customer_id = $_POST["customer_id"];
  $qty = $_POST["qty"];
  $price = $_POST["price"];
  $timeDate = $_POST["timeDate"];
  $sql = "INSERT INTO  ordertbl (product_id, customer_id, qty, price, timeDate)
  VALUES ('$product_id', '$customer_id', '$qty', '$price', '$timeDate' )";
  $conn->query($sql);
  $conn->close();
  header("location: admin.php");
