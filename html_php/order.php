<?php
session_start();
include '../db.php';
$valueArray = $_SESSION["cart"];

function confirmOrder($array, $conn) {
  if (is_array($array)) {
    foreach ($array as $key => $value) {
      $product_id = mysqli_real_escape_string($conn, $value["product_id"]);
      $custId = $_SESSION["customerId"];
      $price = mysqli_real_escape_string($conn, $value["product_price"]);
      $qty = mysqli_real_escape_string($conn, $value["item_quantity"]);

      $sql = "INSERT INTO ordertbl (product_id, customer_id, qty, price)
      VALUES ('".$product_id."', '".$custId."', '".$qty."', '".$price."')";
      mysqli_query($conn, $sql);
    }
  } else {
    echo "Not an Array!";
    header("location: menu.php");
  }
}

function submitOrder($array, $conn) {
  $totalCost = 0;
  if (is_array($array)) {
    foreach ($array as $key => $value) {
      $custId = $_SESSION["customerId"];
      $totalCost = $totalCost + ($value["item_quantity"] * $value["product_price"]);
    }

      $sql = "INSERT INTO orderplustbl (customer_id, totalCost)
      VALUES ('".$custId."', '".$totalCost."')";
      mysqli_query($conn, $sql);
  }
}

confirmOrder($valueArray, $conn);
submitOrder($valueArray, $conn);
header("location: confirm.php");
