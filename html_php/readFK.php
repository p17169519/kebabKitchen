<?php
  include '../db.php';
  $sql = "SELECT * FROM fooditemtbl";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    if (isset($_GET['id']) && $row['id'] == $_GET['id']) {
      echo '<form class="editForm" action="updateFK.php" method="POST">';
      echo '<td><input type="number" class="formLine" name="type_id" value="'.$row['type_id'].'"</td>';
      echo '<td><input type="text" class="formLine" name="foodName" value="'.$row['foodName'].'"</td>';
      echo '<td><input type="number" class="formLine" name="price" value="'.$row['price'].'"</td>';
      echo '<td><input type="text" class="formLine" name="description" value="'.$row['description'].'"</td>';
      echo '<td><button type="submit" class="btn">Save</button></td>';
      echo '<input type="hidden" name="id" value="' .$row['id'].'">';
      echo '</form>';

    } else {
      echo "<tr>";
      echo "<td>" . $row['type_id'] . "</td>";
      echo "<td>" . $row['foodName'] . "</td>";
      echo "<td>" . $row['price'] . "</td>";
      echo "<td>" . $row['description'] . "</td>";
      echo '<td><a class ="btn" href="admin.php?id=' . $row['id'] . '" role="button">Update</a></td>';
      echo '<td><a class ="btn" href="deleteFK.php?id=' . $row['id'] . '" role="button">Delete</a></td>';
      echo "</tr>";
    }
  }

  $conn->close();
