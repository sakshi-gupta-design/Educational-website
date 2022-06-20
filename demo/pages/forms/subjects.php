
<?php
ob_start();
require('index.php');
$subjects='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from subjects where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$subjects=$row['subjects'];
	}else{
		header('location:subject.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$subjects=get_safe_value($con,$_POST['subjects']);
	$res=mysqli_query($con,"select * from subjects where subjects='$subjects'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="subject already exist";
			}
		}else{
			$msg="subject already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update subjects set subjects='$subjects' where id='$id'");
		}else{
			mysqli_query($con,"insert into subjects(subjects,status) values('$subjects','1')" );
		}
		header('location:subject.php');
		die();
	}
}
?>




	  
	  
	   <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
	  <form method="post" enctype="multipart/form-data">
        <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
				<div class="template-demo">
                    <div class="mdc-layout-grid__inner">
					
					<div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-6-desktop stretch-card">
                <div class="mdc-card">
                  <h6 class="card-title">Add Subject </h6>
                  <div class="template-demo">
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input type="text" name="subjects" placeholder="Enter subject name" class="mdc-text-field__input" id="text-field-hero-input" >
                          
						  <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                          
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
				  
				  </div>
				  <div class="mdc-card" style="justify-content:center; align-items:center;">
                  <div class="template-demo">
                    <button name="submit" type="submit" class="mdc-button mdc-button--raised"  id="payment-button">
                      Submit
                    </button>
					<button name="reset" type="cancel" class="mdc-button mdc-button--raised"  id="payment-button">
                      Reset
                    </button>
					<button class="mdc-button mdc-button--raised"   id="payment-button"> <a href="subject.php" style="color:white;">
                     Added subjects 
                    </a></button>
					<div class="field_error"><?php echo $msg?></div>
            </div>
          </div>
                </div>
              </div>
			  
			  </div>
                </div>
				</div>
              </div>
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