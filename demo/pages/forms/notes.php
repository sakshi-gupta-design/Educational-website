<?php

ob_start();
require('index.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update notes set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from notes where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

	// fetch files
$sql = "select file from notes";
;

$sql= "select notes.*,subjects.subjects from notes,subjects where notes.subjects_id=subjects.id order by notes.id desc";
$res= mysqli_query($con, $sql);
?>


<!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
               
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">Subject Notes</h6>
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr>
                          <th class="text-left">#</th>
								<th>ID</th>
							   <th>File Name</th>				
							   <th>Subject</th>				
							   <th>View</th>
							   <th>Download</th>
							   <th>Status</th>
								<th></th>   
					  </tr>
                      </thead>
                      <tbody>
                        <?php 
						
							$i=1;
							while($row = mysqli_fetch_array($res)) { ?>
							<tr>
							   <td class="serial"><?php echo $i++?></td>
							   <td><?php echo $row['id']?></td>
							    <td><?php echo $row['filename']; ?></td>
							   <td><?php echo $row['subjects']?></td>
                   <td><a href="documents/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                    <td><a href="documents/<?php echo $row['filename']; ?>" download>Download</a></td>
							   <td><?php echo $row['status']?></td>
							   
							   <td>
								<?php
								if($row['status']==1){
									echo "<a href='?type=status&operation=deactive&id=".$row['id']."' style='color:#e94086;'>
                        <i class='material-icons mdc-button__icon' aria-hidden='true' title='active'>visibility</i></a>&nbsp;";
                      
								}else{
									echo "<a href='?type=status&operation=active&id=".$row['id']."'  style='color:#e94086;'>
                        <i class='material-icons  mdc-button__icon' title='Deactive'>visibility_off</i></a>&nbsp;";
                      
								}
								echo "<a href='sub_notes.php?id=".$row['id']."'>
					  <i class='material-icons mdc-button__icon update' title='Edit'>mode_edit</i></a>&nbsp;";
								
								echo "<a href='?type=delete&id=".$row['id']."' style='color:red;'>
                        <i class='material-icons mdc-button__icon' title='Delete'></i></a>";
								
								?>
							   </td>
							</tr>
						  <?php } ?>
                      </tbody>
                    </table>
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
					<button class="mdc-button mdc-button--raised"   id="payment-button"> <a href="sub_notes.php" style="color:white;">
                     Add Notes 
                    </a></button>
            </div>
          </div>
		  </div>
    </div>
  </div>
        </main>
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
					