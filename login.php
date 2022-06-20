<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/favi1.ico" type="image/ico">
<title> Sign in & Sign up form</title>
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
section{
	background :url(img/login.jpg) no-repeat center center/cover;
}

</style>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">


</head>
<body>

<!-- registration php is here -->
<?php

include 'registration.php';

 
if(isset($_POST['create'])){
	
			$fname = mysqli_real_escape_string($con, $_POST['fname']);
			 $name = mysqli_real_escape_string($con, $_POST['name']);
			  $email = mysqli_real_escape_string($con, $_POST['email']);
			 $pass = mysqli_real_escape_string($con, $_POST['password']);
			 $cnfm = mysqli_real_escape_string($con, $_POST['confirm']);

			$password = password_hash($pass, PASSWORD_BCRYPT); 
			$cpassword = password_hash( $cnfm, PASSWORD_BCRYPT); 
			
			
			
			$emailquery = "select * from userlogin where email='$email'";
			$query = mysqli_query($con,$emailquery);
			
			$email_count= mysqli_num_rows($query);
	
	if($email_count>0){
		
		 ?>
					
					<script>
					alert ("Email Already Exists");
					</script>

				<?php
	}else{
		if($pass === $cnfm){
			
			$insertquery = "insert into userlogin(fname, name, email, password, confirm)
			values('$fname', '$name', '$email', '$password', '$cpassword')";
			
			$iquery = mysqli_query($con, $insertquery);
			
			if($iquery){
				
					?>
					
					<script>
					alert ("INSERTED succesful");
					</script>
					
					<?php
				} else{
					
					 ?>
					
					<script>
					alert ("NOT INSERTED ");
					</script>

				<?php
				}
			
		}else{
			
			 ?>
					
					<script>
					alert ("Password Are Not Matching");
					</script>

				<?php
		}
	
	
	}
	
	
}
?>

<!-- registration php ends here -->





<!-- login php is here -->



<?php



 $con = mysqli_connect('localhost','root') ;

mysqli_select_db($con, 'userregistration');


 
if(isset($_POST['login'])){

			$email = $_POST['email'];
			$pass = $_POST['password'];

			$email_search = "select * from userlogin where email='$email' ";

			$query = mysqli_query($con, $email_search);

			$email_count = mysqli_num_rows($query);


if($email_count){

			$email_pass = mysqli_fetch_assoc($query);
			$db_pass = $email_pass['password'];
			
			$_SESSION['username'] = $email_pass['name'];
			
			$pass_decode = password_verify($pass, $db_pass);
		
		    if($pass_decode){
			
				echo "Login Successful";
			?>
			<script>
			location.replace("profile.php");
			</script>
			<?php
			
				}else{
				 
				echo "  Incorrect password";
				}
		
		}else{
			echo "Invalid Email";
		}



	}


?>

<!-- LOGIN php ENDS HERE -->


<section >
<br><br><br>
<div class="container">

<!-- LOGIN STARTS HERE -->
<div class="user signinBx">
<div class="imgBx"><img src="img/post.png" ></img>
</div>
<div class="formBx">
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  method="post">
<h2>Sign In</h2>

<input type="email" name="email" placeholder="Email Address" class="form-control" required>
<input type="password" name="password" placeholder="password" class="form-control" required>
<input type="submit" name="login"  value="login" >
<p class="signup"> Don't Have an Account? <a href="#" onclick="toggleForm();">LOGIN NOW</a></p>
</form>
</div>
</div>



<!-- REGISTRATION STARTS HERE -->

<div class="user signupBx">
<div class="formBx">

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"  method="post"  enctype="multipart/form-data" >
<h2>create an account</h2>
<input type="text" name="fname" placeholder="FullName" class="form-control" required>
<input type="text" name="name" placeholder="username" class="form-control" required>
<input type="email" name="email" placeholder="Email Address" class="form-control" required>
<input type="password" name="password" placeholder=" Create Password" class="form-control" required>
<input type="password" name="confirm" placeholder="Confirm password" class="form-control" required>



<input type="submit" name="create"  value="Sign Up">
<p class="signup"> Already Have  an Account? <a href="#" onclick="toggleForm();">Sign in</a></p>
</form>
</div>
<div class="imgBx"><img src="img/My Post.jpg" ></img>
</div>

</div>
</section>

<script type="text/javascript">
function toggleForm()
{
var container= document.querySelector('.container');
container.classList.toggle('active')
}



</script>


















</body>
</html>
