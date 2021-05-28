<?php
  include '../db.php';
  $customerId = $_GET['customerId'];
  $sql = "DELETE FROM customertbl WHERE customerId=$customerId";
  $conn->query($sql);
  $conn->close();
  header("location: admin.php");
