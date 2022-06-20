<?php
require('connect.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$sql="select * from admin_login where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:index.php');
		die();
	}else{
	echo	$msg="Please enter correct login details";	
	}	

}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/favi1.ico" type="image/ico">
	<title>Admin Login</title>
	<link rel="stylesheet" href="../../../assets/css/demo/admin-log.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form method="post">
				<img src="img/avatar.svg">
				<h2 class="title">Admin Login</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="username" class="input"  required autofocus>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input"  required>
            	   </div>
            	</div>
            	<a href="index">Forgot Password?</a>
            	<input type="submit" name="submit" class="btn" value="Login">
            </form>
			<div class="field_error"><?php echo $msg?></div>
        </div>
    </div>
    <script type="text/javascript" src="js/admin-log.js"></script>
</body>
</html>