<?php
  include '../db.php';
  $sql = "SELECT * FROM customertbl";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    if (isset($_GET['customerId']) && $row['customerId'] == $_GET['customerId']) {
      echo '<form class="editForm" action="updateCust.php" method="POST">';
      echo '<td><input type="text" class="formLine" name="firstName" value="'.$row['firstName'].'"</td>';
      echo '<td><input type="text" class="formLine" name="secondName" value="'.$row['secondName'].'"</td>';
      echo '<td><input type="text" class="formLine" name="email" value="'.$row['email'].'"</td>';
      echo '<td><input type="text" class="formLine" name="contactNumber" value="'.$row['contactNumber'].'"</td>';
      echo '<td><input type="text" class="formLine" name="firstAddress" value="'.$row['firstAddress'].'"</td>';
      echo '<td><input type="text" class="formLine" name="secondAddress" value="'.$row['secondAddress'].'"</td>';
      echo '<td><input type="text" class="formLine" name="postCode" value="'.$row['postCode'].'"</td>';
      echo '<td><button type="submit" class="btn">Save</button></td>';
      echo '<input type="hidden" name="customerId" value="' .$row['customerId'].'">';
      echo '</form>';

    } else {
      echo "<tr>";
      echo "<td>" . $row['firstName'] . "</td>";
      echo "<td>" . $row['secondName'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . $row['contactNumber'] . "</td>";
      echo "<td>" . $row['firstAddress'] . "</td>";
      echo "<td>" . $row['secondAddress'] . "</td>";
      echo "<td>" . $row['postCode'] . "</td>";
      echo '<td><a class ="btn" href="admin.php?customerId=' . $row['customerId'] . '" role="button">Update</a></td>';
      echo '<td><a class ="btn" href="deleteCust.php?customerId=' . $row['customerId'] . '" role="button">Delete</a></td>';
      echo "</tr>";
    }
  }

  $conn->close();
