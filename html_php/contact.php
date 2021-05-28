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
    <!-- <link rel="stylesheet" type="text/css" href="../css/styles1.css"/> -->

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

      <div id="googleMap"></div>

        <form class="feedForm" action="createFeed.php" method="post">
          <label><h2>Name</h2></label>
          <input type="text"  id="name" name="name">
          <label for="feedBack"><h2>Leave feedback</h2></label>
          <textarea id="feedBack" name="feedBack" rows="4" cols="50" placeholder="Feedback here..."></textarea>
          <button type="submit" class="btn">Submit</button>
        </form>

        <table class="feed">
          <thead>
            <th>Name</th>
            <th>Feed Back</th>
          </thead>
          <tbody>
            <?php include 'readFeed.php'; ?>
          </tbody>
      </table>

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
    <script src="../javaScript/google.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxj0lm-AB0-kbqAAzM43gQB370iwOLtg4&callback=initMap">

    </script>

  </body>
</html>
