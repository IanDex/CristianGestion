<?php
define('INCLUDE_CHECK',1);
require "conn.php";
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
		<title>SoftAOX Shopping Cart</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
	<body>
		<div class="col-100">
			<div class="col-70">
				<h1>SoftAOX</h1>
				<h3>Online Apple Shopping</h3>
				<?php
				$result = mysql_query("SELECT * FROM asignatura");
				while($row=mysql_fetch_assoc($result))
				{
					echo '
				<div class="item">
					<img src="images/'.$row['img'].'" alt="'.htmlspecialchars($row['name']).'"/>
				</div>';
				}
				?>
			</div>
			<div class="col-30">
					<h1 class="label-txt">My Shopping Bag</h1>
				<div class="content drop-box">
					<span>Drop your Products Here</span>
					<form name="checkoutForm" method="post" action="checkout.php">
						<div id="item-list"></div>
					</form>
					<div id="total"></div>
					<a href="" onclick="document.forms.checkoutForm.submit(); return false;" class="button">Checkout</a>
				</div>
			</div>
		</div>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/simpletip.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
