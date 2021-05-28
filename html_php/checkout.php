<?php
session_start();
include '../db.php';

// add item
if (isset($_POST["add"])) {
  if (isset($_SESSION["cart"])) {
    $item_array_id = array_column($_SESSION["cart"],"product_id");
    if (!in_array($_GET["id"],$item_array_id)){
        $count = count($_SESSION["cart"]);
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][$count] = $item_array;
        echo '<script>window.location="menu.php"</script>';
    }else{
        echo '<script>alert("Product is already Added to Basket")</script>';
        echo '<script>window.location="menu.php"</script>';
    }
  }else{
      $item_array = array(
          'product_id' => $_GET["id"],
          'item_name' => $_POST["hidden_name"],
          'product_price' => $_POST["hidden_price"],
          'item_quantity' => $_POST["quantity"],
      );
      $_SESSION["cart"][0] = $item_array;
  }
}

// remove item
if (isset($_GET["action"])){
  if ($_GET["action"] == "delete"){
      foreach ($_SESSION["cart"] as $keys => $value){
          if ($value["product_id"] == $_GET["id"]){
              unset($_SESSION["cart"][$keys]);
              echo '<script>alert("Product Removed")</script>';
              echo '<script>window.location="menu.php"</script>';
            }
        }
  }
}

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

     <main>

       <div class="checkContainer">
          <div id="checkoutBasket">
            <h3>Basket</h3>
            <form class="checkoutForm" action="order.php" method="post">
              <?php
              $cartArray = $_SESSION["cart"];

              foreach ($cartArray as $key => $value) {

              }
              ?>

            <table>
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
                      <input type="hidden" name="foodName" id="foodName" value="<?php echo $value["item_name"]; ?>">
                      <td><?php echo $value["item_name"]; ?></td>
                      <input type="hidden" name="qty" id="qty" value="<?php echo $value["item_quantity"]; ?>">
                      <td><?php echo $value["item_quantity"]; ?></td>
                      <td>£ <?php echo $value["product_price"]; ?></td>
                      <input type="hidden" name="price" id="price" value="<?php echo number_format($value["item_quantity"] * $value["product_price"]); ?>">
                      <td>£ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>

                    </tr>

                    <?php
                      $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                     ?>
                     <tr>
                       <td colspan="2"></td>
                       <th><a href="menu.php">Edit</a></th>
                       <input type="hidden" name="totalCost" id="grandTotal" value="<?php echo number_format($total, 2); ?>">
                       <th>£ <?php echo number_format($total, 2); ?></th>
                     </tr>
                     <?php
                   }

                ?>
              </table>
                <label for="discountOff"></label>
                <input id="discountOff" name="code" placeholder="Enter code">
                <input type="button" class="buttonD" name="" value="Discount">
                <div id="newCost"></div>

                <div class="pay">
            <?php

              if (isset($_SESSION["firstName"])) {
                // code...
                echo "<p>Please proceed with payment details " . $_SESSION["firstName"] . "</p>";
                echo '
                <h3>Payment</h3>
                <span class="line">
                  <label for="cardName">Name on card:</label>
                  <input id="cardName" name="cardName" placeholder="Name on card" required>
                </span>
                <span class="line">
                  <label for="cardNumber">Name number:</label>
                  <input id="cardNumber" name="cardNumber" placeholder="Card Number" required>
                </span>
                <span class="line">
                  <label for="expDate">Expiry Date:</label>
                  <input type="date" id="expDate" name="expDate" required>
                </span>
                <span class="line">
                  <label for="cvv">CVV:</label>
                  <input type="number" id="cvv" name="cvv" placeholder="CVV number" maxlength="3" required>
                </span>';

              } else {
                // code...
                $register = "login.php";
                echo "<p>Please login or register</p>";
                echo "<a href = '$register'>Register/login</a>";
              }

             ?>
             <input type="submit" value="Pay">
           </div>

          </form>
          </div>

        </div>

     </main>

     <footer>
       <nav>
         <a href="https://www.paypal.com/uk/home" target="_blank"><img src="../images/paypal2.png" alt ="PayPal"></a>
         <a href="contact.php"><img src="../images/contactUs.png" alt ="Contact Us"></a>
         <a href="https://twitter.com/" target="_blank"><img src="../images/twitter.png" alt ="Twitter"></a>
         <a href="https://www.facebook.com/" target="_blank"><img src="../images/facebook.png" alt ="Facebook"></a>
         <a href="https://www.instagram.com/?hl=en" target="_blank"><img src="../images/insta.png" alt ="Instagram"></a>
       </nav>
       <h6>&#169; Chris Freeman 2021</h6>

     </footer>
     <script>
      let btn = document.querySelector(".buttonD");

      function tenOff() {
        let grandTotal = "<?php echo number_format($total, 2); ?>";
        let newCost = document.getElementById('newCost');
        let dCode = document.querySelector('#discountOff').value.toUpperCase();
        let correctDiscount = "KK10";


        if (dCode == correctDiscount) {
          let reduceBy = grandTotal / 100 * 10;
          let discountedPrice = grandTotal - reduceBy;
          newCost.textContent = "Reduced price: £" + `${discountedPrice}`;
        } else {
          alert("Wrong discount code");
        }
      }

      btn.addEventListener("click", tenOff);
     </script>

     <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

   </body>
 </html>
