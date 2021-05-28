<?php
  include '../db.php';
  $firstName = $_POST["firstName"];
  $secondName = $_POST["secondName"];
  $email = $_POST["email"];
  $contactNumber = $_POST["contactNumber"];
  $firstAddress = $_POST["firstAddress"];
  $secondAddress = $_POST["secondAddress"];
  $postCode = $_POST["postCode"];
  $sql = "INSERT INTO  customertbl (firstName, secondName, email, contactNumber,
  firstAddress, secondAddress, postCode)
  VALUES ('$firstName', '$secondName', '$email', '$contactNumber', '$firstAddress', '$secondName', '$postCode')";
  $conn->query($sql);
  $conn->close();
  header("location: admin.php");
