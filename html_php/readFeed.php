<?php
include '../db.php';
$sql = "SELECT * FROM feedbacktbl";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['feedBack'] . "</td>";
  echo "</tr>";
}
$conn->close();
