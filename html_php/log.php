<?php
  include '../db.php';
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("select * from customertbl where email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt_result = $stmt -> get_result();
  if ($stmt_result->num_rows > 0) {
    $data = $stmt_result->fetch_assoc();
    $data2 = $data['password'];
    $checkPwd = password_verify($password, $data2);

    if ($checkPwd === false) {
      // echo "Invalid email or password";
      echo "<script> alert('Invalid email and/or password. Please try again');window.location=`login.php` </script>";
    } else {
      if (($email == "admin@admin.com") && ($checkPwd == "12345678")) {

        header("location: admin.php");
      } else {
        header("location: index.php");
      }
      // echo "<script> alert('Welcome Back');window.location=`index.html` </script>";
      session_start();
      $_SESSION["firstName"] = $data["firstName"];
      $_SESSION["customerId"] = $data["customerId"];

    }
  } else {
  echo "<script> alert('Invalid email and/or password. Please try again');window.location=`login.php` </script>";
  }
