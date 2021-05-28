<?php
  include '../db.php';
  $sql = "SELECT * FROM ordertbl";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    if (isset($_GET['orderId']) && $row['orderId'] == $_GET['orderId']) {
      echo '<form class="editForm" action="updateOrder.php" method="POST">';
      echo '<td><input type="number" class="formLine" name="product_id" value="'.$row['product_id'].'"</td>';
      echo '<td><input type="number" class="formLine" name="customer_id" value="'.$row['customer_id'].'"</td>';
      echo '<td><input type="number" class="formLine" name="qty" value="'.$row['qty'].'"</td>';
      echo '<td><input type="number" class="formLine" name="price" value="'.$row['price'].'"</td>';
      echo '<td><input type="text" class="formLine" name="timeDate" value="'.$row['timeDate'].'"</td>';
      echo '<td><button type="submit" class="btn">Save</button></td>';
      echo '<input type="hidden" name="orderId" value="' .$row['orderId'].'">';
      echo '</form>';

    } else {
      echo "<tr>";
      echo "<td>" . $row['product_id'] . "</td>";
      echo "<td>" . $row['customer_id'] . "</td>";
      echo "<td>" . $row['qty'] . "</td>";
      echo "<td>" . $row['price'] . "</td>";
      echo "<td>" . $row['timeDate'] . "</td>";
      echo '<td><a class ="btn" href="admin.php?orderId=' . $row['orderId'] . '" role="button">Update</a></td>';
      echo '<td><a class ="btn" href="deleteOrder.php?orderId=' . $row['orderId'] . '" role="button">Delete</a></td>';
      echo "</tr>";
    }
  }

  $conn->close();
