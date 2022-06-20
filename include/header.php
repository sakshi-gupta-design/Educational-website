<?php
require('connection.inc.php');
require('functions.inc.php');
$cat_res=mysqli_query($con,"select * from semesters where status=1 order by semesters asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;
}
?>
<!doctype html>
<html lang="en-US">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="icon" href="img/favi1.ico" type="image/ico">
	<title>EduMistic || SDians Study App</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/hover.css">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' >
	
</head>

<body>
<!--================ Start Header Menu Area =================-->
	<header class="header_area">
		<div class="header-top">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-4 col-sm-4  header-top-left">
						<a href="tel:+9530123654896">
							<span class="lnr lnr-phone"></span>
							<span class="text">
								<span class="text">+91 1234567890</span>
							</span>
						</a>
						<a href="mailto:support@colorlib.com">
							<br><span class="lnr lnr-envelope"></span>
							<span class="text">
								<span class="text">info.Edumistic@gmail.com</span>
							</span>
						</a>
						
					</div>
					<div class="col-lg-2 col-sm-2 header-top-center">
					<iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:0;padding:0;width:240px;height:25px;"src="https://www.clocklink.com/html5embed.php?clock=018&timezone=India_NewDelhi&color=yellow&size=240&Title=&Message=&Target=&From=2020,1,1,0,0,0&DateFormat=d / MMM / yyyy DDD&TimeFormat=hh:mm:ss TT&Color=yellow"></iframe>
					</div>

					<div class="col-lg-6 col-sm-6  header-top-right">
						<a href="profile.php" class="text-uppercase">profile</a>
						<a href="https://www.pdfdrive.com/" class="text-uppercase" target="_blank">download books</a>
						<a href="logout.php" class="text-uppercase">Log out</a>
						
					</div>
				</div>
			</div>
		</div>

		<div class="main_menu">
			<div class="search_input" id="search_input_box">
				<div class="container">
					<form class="d-flex justify-content-between" method="" action="">
						<input type="text" class="form-control" id="search_input" placeholder="Search Here">
						<button type="submit" class="btn"></button>
						<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
					</form>
				</div>
			</div>

			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo1.png" alt="" width="200px"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">

							<li class="nav-item active">
							<a class="nav-link" href="index.php">
							<i class="fa fa-home" aria-hidden="true"></i>
							Home</a></li>
							
							
							
							<li class="nav-item"><a class="nav-link" href="about-us.php">
							<i class="fa fa-user" aria-hidden="true"></i>
							About Us
						   </a>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false"><i class="fas fa-book-open" aria-hidden="true"></i> Question Paper</a>
								<ul class="dropdown-menu">
									
									 <?php
										foreach($cat_arr as $list){
											?>
											<li class="nav-item"><a class="nav-link" href="ques.php?id=<?php echo $list['id']?>"><?php echo $list['semesters']?></a></li>
											<?php
										}
										?></li>					
																		
								</ul>
								
								<li class="nav-item"><a class="nav-link" href="notes_doc.php">
							<i class="fas fa-file-pdf" aria-hidden="true"></i>
							Notes
						   </a>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false"><i class="fa fa-video" aria-hidden="true"></i> Videos</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="courses.php">Semester-1</a></li>

								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false"> <i class="fa fa-th" aria-hidden="true"></i> Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
								<!--	<li class="nav-item"><a class="nav-link" href="single-blog.php">Blog Details</a></li>  -->								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Code-X</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="https://www.mycompiler.io/">compiler</a></li>
									<li class="nav-item"><a class="nav-link" href="https://codepen.io/pen/">code pen</a></li>
									
									
									
								</ul>
							</li>
							
							
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================ End Header Menu Area =================-->

	