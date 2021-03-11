<?php
require_once('config.php');
	session_start();
	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id';
		$stmt=$db->prepare($sql);
		$result=$stmt->execute();
		$count = $stmt->rowCount($sql);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}
?>