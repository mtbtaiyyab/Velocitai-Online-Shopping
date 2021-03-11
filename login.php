<?php
session_start();
require_once('config.php');

if(isset($_SESSION['userlogin'])){
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Velocitai Online Shopping</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		 <link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	<body>
		<div>
			
			<?php
				if(isset($_POST['create'])){
					$firstname   =$_POST['firstname'];
					$lastname    =$_POST['lastname'];
					$email 		 =$_POST['email'];
					$phoneno     =$_POST['phoneno'];
					$password    =$_POST['password'];

					$sql="INSERT INTO users (firstname,lastname,email,phoneno,password) VALUES(?,?,?,?,?)";
					$stmt_insert=$db->prepare($sql);
					$result=$stmt_insert->execute([$firstname,$lastname,$email,$phoneno,$password]);
					if($result)
					{
						echo "<div>saved</div>";
					}
					else{
						echo "<div>Error</div>";
					}
				}
			?>

		</div>
		<div class="header">
		  <a href="#default" class="logo">Velocitai Online Shopping</a>
		  <div class="header-right">
		    <a class="active" href="checkout.php">My Cart</a>
		        <a href="#about"></a>
		    <a href="index.php?logout=true" class="header-right">Log Out</a>
		</div>

	</div>
	<hr class="mb-5">
		<div>
			<form action="login.php" method="post">
				<div class="container">

					<div class="row">
						<div class="col-sm-5"> 
							<h1>Registration</h1>
							<p>Fill Up</p>
							<hr class="mb-3">
							<label for="firstname"><b>First Name</b></label>
							<input class="form-control" type="text" id="firstname" name="firstname" required>

							<label for="lastname"><b>Last Name</b></label>
							<input class="form-control" type="text" id="lastname" name="lastname" required>

							<label for="email"><b>E-mail</b></label>
							<input class="form-control" type="email" id="email" name="email" required>

							<label for="phoneno"><b>Phone No.</b></label>
							<input class="form-control" type="text" id="phoneno" name="phoneno" required>

							<label for="password"><b>Password</b></label>
							<input class="form-control" type="password" id="password" name="password" required>

							<hr class="mb-3 ">

							<input class="btn btn-primary" type="submit" id="register" name="create" value="Sign-up">
							</form>
						</div>
						<div class="col-sm-2"></div>
						<div class="col-sm-5">
							<h1><center>Login</center></h1>
							<form action="index.php" method="post">
								<hr class="mb-5">
								<label for="email"><b>Username</b></label>
							<input class="form-control" type="email" id="username" name="lemail" placeholder="E-mail"required>

							<label for="password"><b>Password</b></label>
							<input class="form-control" type="password" id="lpassword" name="lpassword" required>
							<hr class="mb-5">
							<input class="btn btn-primary" type="submit" id="loginbutton" name="login" value="Login">
							
						</div>
					</div>
				</div>
			</form>
			<span></span>
		</div>
	<script type="text/javascript" src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
<!-- 	<script type="text/javascript">
		
		$(function(){
				 $('#register').click(function(e){

				 	var valid=this.form.checkValidity();
				
			 		var firstname = $('#firstname').val(); 
			 		var lastname  = $('#lastname').val(); 
			 		var email     = $('#email').val(); 
			 		var phoneno   = $('#phoneno').val(); 
			 		var password  = $('#password').val(); 
				 });

		});

	</script> -->
	<script type="text/javascript">
		
		$(function(){
			$('#loginbutton').click(function(e){

				var valid=this.form.checkValidity();

				if(valid){
					var username = $('#username').val();
					var lpassword= $('#lpassword').val();
				}
				e.preventDefault();

				$.ajax({
					type:'POST',
					url:'jslogin.php',
					data:{username:username,lpassword:lpassword},
					success:function(data){
							if($.trim(data)==="1"){
								setTimeout('window.location.href= "index.php"',1000);
							}
					},
					error: function(data){
						alert("Error");
					}
				});
			});
		});

	</script>
	</body>
</html>