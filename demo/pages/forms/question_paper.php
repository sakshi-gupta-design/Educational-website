
<?php
ob_start();
require('index.php');

$title='';
$semesters_id='';
$paper_code='';
$date_posted='';

$meta_title	='';
$meta_description='';

$msg='';
$image_required='required';

if(isset($_GET['id']) && $_GET['id']!=''){
	
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from question_paper where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$semesters_id=$row['semesters_id'];
		$title=$row['title'];
		$paper_code=$row['paper_code'];
		$date_posted=$row['date_posted'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		
	}else{
		
		die();
	}
}


if(isset($_POST['submit'])){
$semesters_id=get_safe_value($con,$_POST['semesters_id']);
	$title=get_safe_value($con,$_POST['title']);
	$paper_code=get_safe_value($con,$_POST['paper_code']);
	$date_posted=get_safe_value($con,$_POST['date_posted']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$meta_desc=get_safe_value($con,$_POST['meta_desc']);
	
 $res = mysqli_query($con,"select * from question_paper where id='$id'");
	$check = mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Title already exist";
			}
		}else{
			$msg="Title already exist";
		}
	}
	
if($msg==''){
	
		if(isset($_GET['id']) && $_GET['id']!=''){			
			if($_FILES['image']['title']!=''){
			 
	  $v1=rand(1111,9999);
	  $v2=rand(1111,9999);
	  $v3=$v1.$v2;
	  $v3=md5($v3);
	  
	  $fnm=$_FILES["image"]["name"];
	  $dst="media/".$v3.$fnm;
	  $dst1="media/".$v3.$fnm;
	  move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
				$update_sql="update question_paper set title='$title',semesters_id='$semesters_id',paper_code='$paper_code',date_posted='$date_posted',meta_title='$meta_title',meta_desc='$meta_desc',image='$dst1' where id='$id'";
		}else{
				$update_sql="update question_paper set title='$title',semesters_id='$semesters_id',paper_code='$paper_code',date_posted='$date_posted',meta_title='$meta_title',meta_desc='$meta_desc' where id='$id'";
			}
		mysqli_query($con,$update_sql);
		}else{
			 
	  $v1=rand(1111,9999);
	  $v2=rand(1111,9999);
	  $v3=$v1.$v2;
	  $v3=md5($v3);
	  
	  $fnm=$_FILES["image"]["name"];
	  $dst="./media/".$v3.$fnm;
	  $dst1="media/".$v3.$fnm;
	  move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
			mysqli_query($con,"insert into question_paper (title, semesters_id, paper_code, date_posted, image, meta_title, meta_desc, status) values ('$title', '$semesters_id', '$paper_code', '$date_posted', '$dst1', '$meta_title', '$meta_desc', 1)");
		}
		
		header('location:quest-paper.php');
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
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                  
                  <div class="template-demo">
                    <div class="mdc-layout-grid__inner">
					<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input type="text" id="title" name="title" class="mdc-text-field__input"  value="<?php echo $title?>">
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">Title</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
					  
					  
					  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input  type="text" id="paper-code" name="paper_code" class="mdc-text-field__input" id="text-field-hero-input"  value="<?php echo $paper_code?>">
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">Paper Code</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
				</div>
              </div>
			  
			  
              <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-6-desktop stretch-card">
                <div class="mdc-card">
                  <h6 class="card-title">Semester</h6>
				   <div class="template-demo">
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <select class="mdc-text-field__input" id="text-field-hero-input" name="semesters_id"  value="<?php echo $semesters_id?>">
			<option> Select Semester </option>
				<?php
				$res=mysqli_query($con,"select id,semesters from semesters order by semesters asc");
				while($row=mysqli_fetch_assoc($res))
				{
				if($row['id']==$semesters_id)
				{
				echo "<option selected value=".$row['id'].">".$row['semesters']."</option>";
				}else
				{
				echo "<option value=".$row['id'].">".$row['semesters']."</option>";
			}
											
		}
	?> 
	</select>
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
				  </div>
                </div>
              </div>
			  
			   <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-6-desktop stretch-card">
                <div class="mdc-card">
                  <h6 class="card-title">Date Posted</h6>
                  <div class="template-demo">
				  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input type="date" class="mdc-text-field__input" name="date_posted" id="text-field-hero-input"  value="<?php echo $date_posted?>">
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                          
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
                          <input  type="file" id="myimage" name="image" class="mdc-text-field__input"  <?php echo  $image_required?>>
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">image Upload</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                         <select id="status" name="status" class="mdc-text-field__input" id="text-field-hero-input">
						  <option value="SEMESTER-1">ACTIVE</option>
						  <option value="SEMESTER-2">INACTIVE	</option>
						  
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
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input name="meta_title"  class="mdc-text-field__input" id="text-field-hero-input" <?php echo $meta_title?>>
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">Meta Title</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input name="meta_desc" class="mdc-text-field__input" id="text-field-hero-input" <?php echo $meta_description?>>
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">Meta Description</label>
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
					<button class="mdc-button mdc-button--raised"   id="payment-button"> <a href="quest-paper.php" style="color:white;">
                     Added Papers List 
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