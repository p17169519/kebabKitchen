<?php
  include '../db.php';
  $id = $_GET['id'];
  $sql = "DELETE FROM fooditemtbl WHERE id=$id";
  $conn->query($sql);
  $conn->close();
  header("location: admin.php");
