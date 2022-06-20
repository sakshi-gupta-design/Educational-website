<?php
ob_start();
include_once 'include/header.php' ;
error_reporting(0); 
$con = mysqli_connect("localhost","root","","admin_panel");
$cat_res=mysqli_query($con,"select * from semesters where status=1 order by semesters asc");
$cat_arr=array();
while($row= mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;
}

$cat_id=mysqli_real_escape_string($con,$_GET['id']);
$get_question=get_question($con,'',$cat_id);

//for notes

$cate_res=mysqli_query($con,"select * from subjects where status=1 order by subjects asc");
$cate_arr=array();
while($row= mysqli_fetch_assoc($cate_res)){
	$cate_arr[]=$row;
}

$cate_id=mysqli_real_escape_string($con,$_GET['subjects_id']);
$get_notes=get_notes($con,'',$cate_id);


?>


  



    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Subject Notes</h2>
                            <p>Education gives us an understanding of the world around us 
							and offers us an opportunity to use that knowledge wisely.</p>
                            <div class="page_link">
                                <a href="index.php">Home</a>
                                <a href="about-us.php">Subject Notes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Department Area =================-->
   <div class="popular_courses lite_bg">
        <div class="container">
		<div class="row">
		<table class="table table-hover ">
				 <thead>
					  <tr class="w3-light-grey">
					  <th>S.NO.</th>
					  <th>Subject</th>
						<th>Filename</th>
						<th>View</th>
						<th>Download</th>
					  </tr> </thead>
					
		<?php if(count($get_notes)>0){?>
			<?php
			$i=1;
			foreach($get_notes as $list){
			?>		
                   <tbody style="color:#000; font-weight: 400;">             
				<tr>
				<a href="#?id=<?php echo $list['id']?>&nbsp;">
					<td><?php echo $i++?></td>
					<td><?php echo $list['subjects']; ?></td>
					<td><?php echo $list['filename']; ?></a></td>
					<td><a href="./admin-panel/demo/pages/forms/documents/<?php echo $list['filename']; ?>" style="color:blue;" target="_blank">View </a> </td>
					<td><a href="./admin-panel/demo/pages/forms/documents/<?php echo $list['filename'];?>" style="color:black;" download>Download</a> </td>
			       
                </tr>
				</tbody>
				
					
					 
						<?php } ?>	
			
			<?php } else { 
			    echo "Notes are currently NOT Available in this Subject!!!...";
			}?>
		 </table> 
		</div>			
    	</div>
              
        </div>
							
				
		
    <!--================ End Department Area =================-->

    

  
 <?php
include_once 'include/footer.php' ;
?>
	
</body>

</html>