<?php
	include 'index.php'; 

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
		$update_status_sql="update videos set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);

	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from videos where id='$id'";
		mysqli_query($con,$delete_sql);
	}
	}
?>


<!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
               
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">Added Videos</h6>
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr>
                          <th class="serial">#</th>
								<th>ID</th>
							   <th>Title</th>				
							   <th>video</th>
							   <th>status</th>
								<th></th>   
					  </tr>
                      </thead>
                      <tbody>
                        <?php 
							$result="";
							$result=selectalldata('videos');
							$i=1;
							while($data=mysqli_fetch_array($result))
							{?>
							<tr>
							   <td class="serial"><?php echo $i++?></td>
							   <td><?php echo $data['id']?></td>
							    <td><?php echo $data['title'];?></td>
							   <td><video height="50"><source src="videos/<?php echo $data['video'];?>" type="video/mp4"></video></td>
							   <td><?php echo $data['status']?></td>
							   
							   <td>
								<?php
								if($data['status']==1){
									echo "<a href='?type=status&operation=deactive&id=".$data['id']."' style='color:#e94086;'>
                        <i class='material-icons mdc-button__icon' aria-hidden='true' title='active'>visibility</i></a>&nbsp;";
                      
								}else{
									echo "<a href='?type=status&operation=active&id=".$data['id']."'  style='color:#e94086;'>
                        <i class='material-icons  mdc-button__icon' title='Deactive'>visibility_off</i></a>&nbsp;";
                      
								}
								echo "<a href='edit_video.php?id=".$data['id']."'>
					  <i class='material-icons mdc-button__icon update' title='Edit'>mode_edit</i></a>&nbsp;";
								
								echo "<a href='?type=delete&id=".$data['id']."' style='color:red;'>
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
					<a href="addvideo.php" style="color:white;"><button class="mdc-button mdc-button--raised"   id="payment-button"> 
                     Add Videos
                   </button> </a>
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