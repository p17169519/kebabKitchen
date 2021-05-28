<?php
  include '../db.php';
  $name = $_POST["name"];
  $feedBack = $_POST["feedBack"];

  $sql = "INSERT INTO  feedbacktbl (name, feedBack)
  VALUES ('$name', '$feedBack')";
  $conn->query($sql);
  $conn->close();
  header("location: contact.php");
