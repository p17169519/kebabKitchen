<?php
  include '../db.php';
  $orderId = $_POST['orderId'];
  $product_id = $_POST["product_id"];
  $customer_id = $_POST["customer_id"];
  $qty = $_POST["qty"];
  $price = $_POST["price"];
  $timeDate = $_POST["timeDate"];

  $sql = "UPDATE ordertbl SET orderId='$orderId', product_id='$product_id', customer_id='$customer_id', qty='$qty', price='$price',
  timeDate='$timeDate'
  WHERE orderId=$orderId";
  $result = $conn->query($sql);
  $conn->close();
  header("location: admin.php");
