<?php
 session_start();
require_once('config.php');



$username = $_POST['username'];
$lpassword = $_POST['lpassword'];

$sql ="SELECT * FROM users WHERE email= ? AND password= ? LIMIT 1";
$stmtselect = $db->prepare($sql);
$result=$stmtselect->execute([$username,$lpassword]);

if($result){
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		 $_SESSION['userlogin'] = $user;
		echo "1";
	}
	else{
		echo "Sign-UP";
	}
}
else{
	echo "Errors";
}