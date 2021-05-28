<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebab Kitchen +</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
  </head>
  <body>
    <div class="top">
      <div class="log">
    <?php
      if (isset($_SESSION["firstName"])) {
        $link = "logout.php";
        echo "<a href = '$link'>Logout</a>";
      } else {
        echo '
        <h2 class="onHover">Login/Register</h2>
        <a href="login.php"><img src="../images/PngItem_1114675.png" alt ="Login/Register"></a>
        ';
      }
     ?>
     <!-- image source for logout pngitem.com -->
     </div>
    </div>

    <header>
      <a href="index.php">
				<h1>KK<img src="../images/plus.png" alt ="Plus Symbol"></h1>
				<h1 class="hLarge">Kebab Kitchen <img src="../images/plus.png" alt ="Plus Symbol"></h1>
			</a>
    </header>

    <div id="discount">
      <a href="#"><h2>use code <em>'KK10'</em> for 10% off</h2></a>
      <a href="menu.php"><h2>Menu</h2></a>
    </div>

    <main class="confirmMenu">
      <h2>Confirmed Order</h2>
      <table class="invoice">
        <tr>
          <th>Item</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
        </tr>

      <?php

        if(!empty($_SESSION["cart"])) {
          $total = 0;
          foreach ($_SESSION["cart"] as $key => $value) {
      ?>
        <tr>
          <td><?php echo $value["item_name"]; ?></td>
          <td><?php echo $value["item_quantity"]; ?></td>
          <td>£ <?php echo $value["product_price"]; ?></td>
          <td>£ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>

        </tr>
            <?php
              $total = $total + ($value["item_quantity"] * $value["product_price"]);
          }
           ?>
           <tr>
             <td colspan="3"></td>
             <th>£ <?php echo number_format($total, 2); ?></th>
           </tr>
               <?php
             }
          ?>

        </table>
        <button type="button" name="print" class="printBtn">Print</button>
    </main>

  <footer>
    <nav>
      <a href="https://www.paypal.com/uk/home" target="_blank"><img src="../images/paypal2.png" alt ="PayPal"></a>
      <a href="contact.php"><img src="../images/contactUs.png" alt ="Contact Us"></a>
      <a href="https://twitter.com/" target="_blank"><img src="../images/twitter.png" alt ="Twitter"></a>
      <a href="https://www.facebook.com/" target="_blank"><img src="../images/facebook.png" alt ="Facebook"></a>
      <a href="https://www.instagram.com/?hl=en" target="_blank"><img src="../images/insta.png" alt ="Instagram"></a>
    </nav>
    <h6>&#169; Chris Freeman</h6>
  </footer>
  <script src="../javaScript/print.js"></script>
  </body>
</html>
