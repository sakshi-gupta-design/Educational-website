<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['username'])){
		echo "You Are Logged Out.";
		header('location:login.php');
}
?>

<?php
  $conn = mysqli_connect("localhost", "root", "", "img-upload");
  $results = mysqli_query($conn, "select * FROM users");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="icon" href="img/favi1.ico" type="image/ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar Dashboard Template</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
  
  <style>

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body{
	height: 100vh;
	font-family: "Raleway", sans-serif;
	background: #2F3238;
}

.container1{
	margin: 30px;
}

.row{
	width: 100%;
	display: flex;
	justify-content: center;
	flex-wrap: wrap;
	margin-left:30px;
	align-items:center;
	
}

.image{
	background: #50A7FF;
	position: relative;
	flex: 1;
	max-width: 460px;
	height: 300px;
	margin: 20px;
	overflow: hidden;
	background-position: 0px -300px;
	
}

.image img{
	opacity: 0.8;
	position: relative;
	vertical-align: top;
	transition: 0.6s;
	transition-property: opacity;
	
}

.image:hover img{
	opacity: 0.8;
}

.image .details{
	z-index: 1;
	position: absolute;
	top: 0;
	right: 0;
	color: #fff;
	width: 100%;
	height: 100%;
	
}

.image .details h2{
	text-align: center;
	
	font-size: 35px;
	text-transform: uppercase;
	font-weight: 300;
	margin-top: 70px;
	transition: 0.4s;
	transition-property: transform;
}
.image .details h2:hover{
	color:#C70039 ;
}

.image .details h2 span{
	font-weight: 900;
}

.image:hover .details h2{
	transform: translateY(-30px);
}

.image .details p{
	margin: 30px 30px 0 30px;
	font-size: 18px;
	font-weight: 600;
	text-align: center;
	opacity: 0;
	transition: 0.6s;
	transition-property: opacity, transform;
}

.image:hover .details p{
	opacity: 1;
	transform: translateY(-40px);
}

.more{
	position: absolute;
	background: rgba(255, 255, 255, 0.8);
	width: 100%;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 15px;
	bottom: -60px;
	transition: 0.6s;
	transition-property: bottom;
}

.image:hover .more{
	bottom: 0;
}

.more .read-more{
	color: #000;
	text-decoration: none;
	font-size: 20px;
	font-weight: 500;
	text-transform: uppercase;
}

.more .read-more span{
	font-weight: 900;
}

.more .icon-links i{
	color: #000;
	font-size: 20px;
}

.more .icon-links a:not(:last-child) i{
	margin-right: 20px;
}

/* Responsive CSS */

@media (max-width: 1080px){
	.image{
		flex: 100%;
		max-width: 480px;
	}
}

@media (max-width: 400px){
	.image .details p{
		font-size: 16px;
	}

	.more .read-more, .more .icon-links a i{
		font-size: 18px;
	}
}
</style>

  
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
       <a href="index.php"> <img src="img/logo1.png" alt="" width="120px"></img></a>
      </div>
      <div class="right_area">
        <a href="logout.php" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <img src="img/p1.webp" class="mobile_profile_image" alt="">
		 <h4 style ="text-transform: uppercase;"> <?php echo $_SESSION['username']; ?></h4>
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
	   <a href="index.php"><i class="fas fa-desktop"></i><span>Upload Image</span></a>
        <a href="index.php"><i class="fas fa-desktop"></i><span>Home</span></a>
        <a href="faq.html"><i class="fas fa-table"></i><span>FAQS</span></a>
      <a href="blog.html"><i class="fas fa-th"></i><span>Blogs</span></a>
      <a href="contact"><i class="fas fa-phone"></i><span>Contact Us</span></a>
     <br> <h5 style="color:white;">Copyright © 2020 All rights reserved.</h5>
      </div>
    </div>
    <!--mobile navigation bar end-->
	
    <!--sidebar start-->
    <div class="sidebar">
	
      <div class="profile_info">
	  
          
            <?php foreach ($users as $user): ?>
              <img src="<?php echo 'images1/' . $user['profile_image'] ?>" width="90" height="90" alt=""> 
                
              
            <?php endforeach; ?>
          
			<br>
        <h4 style ="text-transform: uppercase;"> <?php echo $_SESSION['username']; ?></h4>
      </div>
	    <a href="form.php">  <i class="fas fa-image"></i><span>Upload Image</span></a>
		<a href="index.php"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="about-us.html"><i class="fas fa-info-circle"></i><span>About</span></a>
        <a href="faq.html"><i class="fas fa-table"></i><span>FAQS</span></a>
        <a href="blog.html"><i class="fas fa-th"></i><span>Blogs</span></a>
        <a href="contact.php"><i class="fas fa-phone"></i><span>Contact Us</span></a>
        <br> <h5 style="color:white;">Copyright © 2020 All  <br>
					Rights Reserved. </h5>
	  </div>
    <!--sidebar end-->

   <!--image card layout start-->
    <div class="container1">
      <!--image row start-->
      <div class="row">
        <!--image card start-->
       
        <!--image card end-->
        <!--image card start-->
        <div class="image">
          <img src="img/p1.webp" alt="" >
          <div class="details">
            <h2> <span>Video Tutorial</span></h2>
            <div class="more">
              <a href="#" class="read-more">Read <span>More</span></a>
              <div class="icon-links">
                <a href="#"><i class="fas fa-heart"></i></a>
                <a href="#"><i class="fas fa-eye"></i></a>
              
              </div>
            </div>
          </div>
        </div>
        <!--image card end-->
        <!--image card start-->
        <div class="image">
          <img src="img/p2.png" alt="" >
          <div class="details">
            <h2> <span>Subject Notes</span></h2>
           <div class="more">
              <a href="#" class="read-more">Read <span>More</span></a>
              <div class="icon-links">
                <a href="#"><i class="fas fa-heart"></i></a>
                <a href="#"><i class="fas fa-eye"></i></a>
              
              </div>
            </div>
          </div>
        </div>
        <!--image card end-->
      </div>
      <!--image row end-->
      <!--image row start-->
      <div class="row">
        <!--image card start-->
      
        <!--image card end-->
        <!--image card start-->
        <div class="image">
          <img src="img/p3.png" alt="">
          <div class="details">
            <h2> <span>  Blogs</span></h2>
            <div class="more">
              <a href="#" class="read-more">Read <span>More</span></a>
              <div class="icon-links">
                <a href="#"><i class="fas fa-heart"></i></a>
                <a href="#"><i class="fas fa-eye"></i></a>
              
              </div>
            </div>
          </div>
        </div>
        <!--image card end-->
        <!--image card start-->
        <div class="image">
          <img src="img/p1.png" alt="">
          <div class="details">
            <h2> <span>Google Trend</span></h2>
           <div class="more">
              <a href="#" class="read-more">Read <span>More</span></a>
              <div class="icon-links">
                <a href="#"><i class="fas fa-heart"></i></a>
                <a href="#"><i class="fas fa-eye"></i></a>
                
              </div>
            </div>
          </div>
        </div>
        <!--image card end-->
      </div>
      <!--image row end-->
    </div>
    <!--image card layout end-->







    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>






  </body>
</html>