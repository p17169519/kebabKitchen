<?php
  include '../db.php';
  $firstName = $_POST['firstName'];
  $secondName = $_POST['secondName'];
  $email = $_POST['email'];
  $contactNumber = $_POST['contactNumber'];
  $firstAddress = $_POST['firstAddress'];
  $secondAddress = $_POST['secondAddress'];
  $postCode = $_POST['postCode'];
  $password = $_POST['password'];
  $registered = "Registered Successfully!! Please login";
  $pass_hash = password_hash($password, PASSWORD_DEFAULT);

  $stmt = $conn->prepare("insert into customertbl(firstName, secondName, email,
  contactNumber, firstAddress, secondAddress, postCode, password)
  VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssss", $firstName, $secondName, $email, $contactNumber, $firstAddress, $secondAddress, $postCode, $pass_hash);
  $stmt->execute();
  $stmt->close();
  $conn->close();
  echo "<script type='text/javascript'>
  alert('Successfully registered!! Please login');
  window.location='login.php';
  </script>";
