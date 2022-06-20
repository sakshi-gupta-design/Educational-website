
<?php
ob_start();
require('index.php');

$file='';
$subjects_id='';
$msg='';
$file_required='required';

if(isset($_GET['id']) && $_GET['id']!=''){
	
	$file_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from notes where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$subjects_id=$row['subjects_id'];
		
		
		
	}else{
		
		die();
	}
}


if(isset($_POST['submit'])){
$subjects_id=get_safe_value($con,$_POST['subjects_id']);
	
 $res = mysqli_query($con,"select * from notes where file='$file'");
	$check = mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_array($res);
			if($id==$getData['id']){
			
			}else{
				$msg="file already exist";
			}
		}else{
			$msg="file already exist";
		}
	}

	 $filename = $_FILES['file']['name'];

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
	 //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from notes';
            $result = mysqli_query($con, $sql);
            if (count($res) > 0)
            {
                $row = mysqli_fetch_array($res);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
                $filename = '1' . '-' . $filename;
	 
	 //set target directory
	 
            $path = 'documents/';
                
            
            move_uploaded_file($_FILES['file']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO notes(subjects_id, filename, status) VALUES('$subjects_id', '$filename', 1)";
            mysqli_query($con, $sql);
            header("Location: notes.php?st=success");
        }
        else
        {
            header("Location: notes.php?st=error");
        }
    }
    else
        header("Location: notes.php");
	 
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
                  <h6 class="card-title">Subject</h6>
				   <div class="template-demo">
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <select class="mdc-text-field__input" id="text-field-hero-input" name="subjects_id"  value="<?php echo $subjects_id?>">
			<option> Select Subject </option>
				<?php
				$res=mysqli_query($con,"select id,subjects from subjects order by subjects asc");
				while($row=mysqli_fetch_assoc($res))
				{
				if($row['id']==$subjects_id)
				{
				echo "<option selected value=".$row['id'].">".$row['subjects']."</option>";
				}else
				{
				echo "<option value=".$row['id'].">".$row['subjects']."</option>";
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
                          <input  type="file" id="myFile" name="file" class="mdc-text-field__input"  <?php echo  $file_required?>>
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">File Upload</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                         <select id="status" name="status" class="mdc-text-field__input" id="text-field-hero-input">
						  <option value="1">ACTIVE</option>
						  <option value="0">INACTIVE	</option>
						  
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
					<button class="mdc-button mdc-button--raised"   id="payment-button"> <a href="notes.php" style="color:white;">
                     Added Notes List 
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