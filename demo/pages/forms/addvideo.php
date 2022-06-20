<?php
	ob_start(); 
include 'index.php';
$title='';
$msg='';


if(isset($_POST['submit'])) {
	
	if(isset($_POST['submit']))
 {
	 $file_name = $_FILES['video']['name'];
      $file_tmp = $_FILES['video']['tmp_name'];
      move_uploaded_file($file_tmp,"videos/".$file_name);
  	  $data=array(
				"title"=>"'".$_POST['title']."'",
				
				"video"=>"'".$file_name."'",
				"status"=>"'".$_POST['status']."'",
				
				
				);
	  
	  insert($data,'videos',$id);
	  
header('location:allvideos.php');
		die();

   }

}








?>	

	  
	<div class="field_error"><?php echo $msg?></div>
	  
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
	  <form method="post" enctype="multipart/form-data">
        <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              
			  
              <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-6-desktop stretch-card">
                <div class="mdc-card">
                  <h6 class="card-title">videos</h6>
				   <div class="template-demo">
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input type="text" id="title" name="title" class="mdc-text-field__input">
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">Title</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
				  </div>
                </div>
              </div>
			  
			   
            </div>
          </div>
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                  
                  <div class="template-demo">
                    <div class="mdc-layout-grid__inner">
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input type="file" id="myFile" name="video" class="mdc-text-field__input">
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">Video Upload</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                         <select id="status" name="status" class="mdc-text-field__input" id="text-field-hero-input">
						  <option value="1">ACTIVE</option>
						  <option value="0">INACTIVE</option>
						  
						  </select>
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">Status</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card" style="justify-content:center; align-items:center;">
                  <div class="template-demo">
                    <button name="submit" type="submit" class="mdc-button mdc-button--raised"  id="payment-button">
                      Submit
                    </button>
					<button name="reset" type="cancel" class="mdc-button mdc-button--raised"  id="payment-button">
                      Reset
                    </button>
					<button class="mdc-button mdc-button--raised"   id="payment-button"> <a href="allvideos.php" style="color:white;">
                     Added Videos List 
                    </a></button>
            </div>
          </div>
        </main>
		</form>
		
        <!-- partial:../../partials/_footer.html -->
        <footer>
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <span class="tx-14">Copyright © 2020 <a href="http://localhost/edumistic/faq.html#" target="_blank">Edumistic</a>. All rights reserved.</span>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex justify-content-end">
                <div class="d-flex align-items-center">
                   <a href="http://localhost/edumistic/index.php">EduMistic</a>
                  <span class="vertical-divider"></span>
                  <a href="http://localhost/edumistic/faq.html#">FAQ</a>
                </div>
              </div>
            </div>
          </div>
        </footer>
         <!-- partial -->
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../../assets/js/material.js"></script>
  <script src="../../../assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
</html>