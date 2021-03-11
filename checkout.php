<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Cart</title>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/checkout.css"/>
</head>
<body>
	<div class="header">
		  <a href="#default" class="logo">Velocitai Online Shopping</a>
		  <div class="header-right">
		    <a class="active" href="checkout.php">My Cart</a>
		        <a href="#about"></a>
		    <a href="index.php?logout=true" class="header-right">Log Out</a>
		</div>
	</div>
	
		<section class="section">
			<div class="container-fluid">	
    		<div id="cart_checkout">
    		</div>
</div>
</section>	
</body>
</html>