<?php
require('connect.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:admin-log.php');
	die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="../../../assets/img/favi1.ico" type="image/ico"> 
 <title>EduMistic || Admin Panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../../assets/css/demo/style.css">
  
  <!-- End layout styles -->
  
  	<link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/favicon.ico">
  
</head>
<body>
<script src="../assets/js/preloader.js"></script>
  <div class="body-wrapper">
    <!-- partial:../../partials/_sidebar.html -->
    <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
      <div class="mdc-drawer__header">
        <a href="../../../../index.php" class="brand-logo">
          <img src="../../../assets/images/logo1.png" alt="logo" style="width:190px; height:60px;">
		 
        </a>
      </div>
      <div class="mdc-drawer__content">
        <div class="user-info">
          <p class="name">Admin</p>
          <p class="email">kit@gmail.com</p>
        </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../../pages/forms/index.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">dashboard</i>
                Dashboard
              </a>
            </div>
            
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../../pages/forms/semesters.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">view_week</i>
               Manage-Semester
              </a>
            </div>
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../../pages/forms/question_paper.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">assignment</i>
                Manage-Exam-Papers
              </a>
            </div>
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../../pages/forms/subjects.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">subject</i>
               Manage-Subject
              </a>
            </div>
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../../pages/forms/sub_notes.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">picture_as_pdf</i>
                Manage-Notes
              </a>
            </div>
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../../pages/forms/addvideo.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">video_library</i>
                Manage-videos
              </a>
            </div>
			<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../../pages/forms/contact_us.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">markunread</i>
                Manage-Queries
              </a>
            </div>
            
          </nav>
        </div>
        <div class="profile-actions">
          <a href="javascript:;">Settings</a>
          <span class="divider"></span>
          <a href="admin-logout.php">Logout</a>
        </div>
        
      </div>
    </aside>
    <!-- partial -->

    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:../../partials/_navbar.html -->
      <header class="mdc-top-app-bar">
        <div class="mdc-top-app-bar__row">
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
            <span class="mdc-top-app-bar__title">Greetings Admin!</span>
          </div>
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
            <div class="menu-button-container menu-profile d-none d-md-block">
              <button class="mdc-button mdc-menu-button">
                <span class="d-flex align-items-center">
                 
                  <span class="user-name">Admin</span>
                </span>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
           
                  <li class="mdc-list-item" role="menuitem">
                    
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal"> <a href="admin-logout.php">Logout</a></h6>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="divider d-none d-md-block"></div>
              <div class="menu-button-container d-none d-md-block">
              <button class="mdc-button mdc-menu-button">
                <i class="mdi mdi-arrow-down-bold-box"></i>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                 
                  <li class="mdc-list-item" role="menuitem">
                    
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal"> <a href="admin-logout.php">Logout</a></h6>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>
	  
      <!-- partial -->
     <div class="page-wrapper mdc-toolbar-fixed-adjust">
         
       
        <!-- partial -->
     
  
  <!-- plugins:js -->
  <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../assets/vendors/chartjs/Chart.min.js"></script>
  <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
   <script src="../../../assets/js/material.js"></script>
  <script src="../../../assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
</html> 