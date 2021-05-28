<?php
  include '../db.php';
  $orderId = $_GET['orderId'];
  $sql = "DELETE FROM ordertbl WHERE orderId=$orderId";
  $conn->query($sql);
  $conn->close();
  header("location: admin.php");
