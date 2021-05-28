<?php
  session_start();
  include '../db.php';

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
         <div id="menuToggler"><ion-icon name="basket-outline"></ion-icon></div>
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
       <div id="myBasket">
         <h3>Basket</h3>
         <table class="basketTable">
           <tr>
             <th>Item</th>
             <th>Quantity</th>
             <th>Price</th>
             <th>Total</th>
             <th>Action</th>
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
               <td>
                 <a href="menu.php?action=delete&id=<?php echo $value["product_id"];  ?>">
                 <button class="rmvBtn">remove</button>
               </td>

             </tr>
                 <?php
                   $total = $total + ($value["item_quantity"] * $value["product_price"]);
               }
                ?>
                <tr>
                  <td colspan="3"></td>
                  <th>£ <?php echo number_format($total, 2); ?></th>
                  <th>
                    <a href = "checkout.php"><button class="checkoutBtn">checkout</button></a>
                  </th>
                </tr>
                    <?php
                  }

               ?>

           </table>
         </div>

       <h5>Menu</h5>
       <div class="menuContainer">
       <?php
          $query = "SELECT * FROM fooditemtbl";
          $result = mysqli_query($conn, $query);
          if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

       ?>

        <form class="menuForm" method="post" action="menu.php?action=add&id=<?php echo $row["id"]; ?>">
            <h2 class="textName"><?php echo $row["foodName"] ?></h2>
            <h2 class="textPrice"><?php echo "£" . $row["price"] ?></h2>
            <h2 class="textDescription"><?php echo $row["description"] ?></h2>
            <input type="text" name="quantity" class="amount" value="1">
            <input type="hidden" name="hidden_name" value="<?php echo $row["foodName"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="submit" name="add" value="add">
        </form>
          <?php

            }
          }
          ?>
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
       <h6>&#169; Chris Freeman</h6>
     </footer>
     <script src="../javaScript/scripts.js"></script>
     <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

   </body>
 </html>
