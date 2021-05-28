<?php
	session_start();
 ?>

<!DOCTYPE html>
<html lang = "en-GB">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Kebab Kitchen + </title>
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
			<div class="formWrap">
				<form class="singnIn" name="signForm" action="log.php" method="post">
					<h2>Sign in</h2>
					<label for="myEmail">Email: </label>
					<input id="myEmail" name="email" type="email" placeholder="Enter email" required>
					<label for="myPassword">Password: </label>
					<input id="myPassword" name="password" type="password" placeholder="Enter password" minlength="8" required>
					<input type="submit" value="login">
	      </form>

				<form name="regForm" action="reg.php" method="POST">

					<h2>Register</h2>
					<label for="firstName">First name:</label>
					<input id="firstName" type="text" name="firstName" placeholder="First name" required>
					<label for="lastName">Last name:</label>
					<input id="lastName" type="text" name="secondName" placeholder="Last name" required>
					<label for="myEmail">Email: </label>
					<input id="myEmail" name="email" type="email" placeholder="Email" required>
					<label for="contactNumber">Contact number:</label>
					<input id="contactNumber" name="contactNumber" type="text" placeholder="Contact number" required>
					<label for="address1">1st line of address:</label>
					<input id="address1" type="text" name="firstAddress" placeholder="1st line of address" required>
					<label for="address2">2nd line of address:</label>
					<input id="address2" type="text" name="secondAddress" placeholder="2nd line of address">
					<label for="postCode">Post code:</label>
					<input id="postCode" type="text" name="postCode" placeholder="Post code" required>
					<label for="myPassword">Password: </label>
					<input id="myPassword" name="password" type="password" placeholder="Password" minlength="8" required>
					<label for="myConfirmation">Confirm password: </label>
          <input id="myConfirmation" type="password" placeholder="Confirm password" required>
					<input id="submit" type="submit" value="register">
				</form>

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
	</body>
</html>
