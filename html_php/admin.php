<?php
  session_start();
  if (!isset($_SESSION["firstName"])) {
    header("Location: login.php");
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
      <a href="menu.php"><h2>use code <em>'KK10'</em> for 10% off</h2></a>
      <a href="menu.php"><h2>Menu</h2></a>
    </div>

    <main>
      <div class="adminSection">
        <?php
          if (isset($_SESSION["firstName"])) {
            echo "<h2>Signed in as " . $_SESSION["firstName"] . "</h2>";
          }
        ?>

        <h2>Menu Details</h2>

        <table class="menuTbl">
          <thead>
            <th>Type</th>
            <th>Food</th>
            <th>Price(£)</th>
            <th>Description</th>
            <th colspan="2">Action</th>
          </thead>
          <tbody>
            <?php include 'readFK.php'; ?>
          </tbody>
        </table>

        <div class="adminWrap">
          <form action="createFK.php" method="post">
            <label>Type:</label>
            <input type="number"  id="type_id" name="type_id">
            <label>Name:</label>
            <input type="text"  id="foodName" name="foodName">
            <label>Price:</label>
            <input type="number" id="price" name="price">
            <label>Description:</label>
            <input type="text" id="description" name="description">
            <button type="submit" class="btn">Add</button>
          </form>
        </div>
    </div>

      <div class="adminSection">
        <h2>Customer details</h2>

        <table class="custTbl">
          <thead>
            <th>1 Name</th>
            <th>2 Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>1 Address</th>
            <th>2 Address</th>
            <th>Postcode</th>
            <th colspan="2">Action</th>
          </thead>
          <tbody>
            <?php include 'readCust.php'; ?>
          </tbody>
        </table>

        <div class="adminWrap">
          <form action="createCust.php" method="post">
            <label>1 Name:</label>
            <input type="text"  id="firstName" name="firstName">
            <label>2 Name:</label>
            <input type="text"  id="secondName" name="secondName">
            <label>Email:</label>
            <input type="text" id="email" name="email">
            <label>Number:</label>
            <input type="text" id="contactNumber" name="contactNumber">
            <label>Address 1:</label>
            <input type="text" id="firstAddress" name="firstAddress">
            <label>Address 2:</label>
            <input type="text" id="secondAddress" name="secondAddress">
            <label>Post Code:</label>
            <input type="text" id="postCode" name="postCode">

            <button type="submit" class="btn">Add</button>
          </form>
      </div>
    </div>

      <div class="adminSection">
        <h2>Orders</h2>
        <table class="orderTable">
          <thead>
            <th>Product Id</th>
            <th>Customer Id</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Time</th>
            <th colspan="2">Action</th>
          </thead>
          <tbody>
            <?php include 'readOrder.php'; ?>
          </tbody>
        </table>

        <div class="adminWrap">
          <form action="createOrder.php" method="post">
            <label>Product Id:</label>
            <input type="number"  id="product_id" name="product_id">
            <label>Customer Id</label>
            <input type="number"  id="customer_id" name="customer_id">
            <label>Quantity:</label>
            <input type="number" id="qty" name="qty">
            <label>Price:</label>
            <input type="number" id="price" name="price">
            <label>Time:</label>
            <input type="text" id="timeDate" name="timeDate">
            <button type="submit" class="btn">Add</button>
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
      <h6>&#169; Chris Freeman</h6>

    </footer>

  </body>
  <!-- The php elements of this page were created with the aid of the below YouTube video -->
  <!-- src=https://www.youtube.com/watch?v=3isdcAEZoq0 -->
</html>
