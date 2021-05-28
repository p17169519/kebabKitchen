<?php
  include '../db.php';
  $customerId = $_POST['customerId'];
  $firstName = $_POST["firstName"];
  $secondName = $_POST["secondName"];
  $email = $_POST["email"];
  $contactNumber = $_POST["contactNumber"];
  $firstAddress = $_POST["firstAddress"];
  $secondAddress = $_POST["secondAddress"];
  $postCode = $_POST["postCode"];

  $sql = "UPDATE customertbl SET customerId='$customerId', firstName='$firstName', secondName='$secondName', email='$email', contactNumber='$contactNumber',
  firstAddress='$firstAddress', secondAddress='$secondAddress', postCode='$postCode'
  WHERE customerId=$customerId";
  $result = $conn->query($sql);
  $conn->close();
  header("location: admin.php");
