<?php

include_once 'include/header.php' ;
$con = mysqli_connect("localhost","root","","admin_panel");

$cat_res=mysqli_query($con,"select * from semesters where status=1 order by semesters asc");
$cat_arr=array();
while($row= mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;
}

$cat_id=mysqli_real_escape_string($con,$_GET['id']);
$get_question=get_question($con,'',$cat_id);


?>


	
	<!--================ End Header Menu Area =================-->
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Question Paper</h2>
                            <p>Education gives us an understanding of the world around us 
							and offers us an opportunity to use that knowledge wisely.</p>
                            <div class="page_link">
                                <a href="index.php">Home</a>
                                <a href="about-us.php">question paper</a>
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
		<div class="row gallery-item">
		<?php if(count($get_question)>0){?>
			<?php
			
			foreach($get_question as $list){
			?>		
				
				
                 
				<div class="view">
                    <a href="#?id=<?php echo $list['id']?>&nbsp;">
					<div class="single-gallery-image">
                      <img src="./admin-panel/demo/pages/forms/<?php echo $list['image']?>" style="width:200px; height:200px;"/>
				<a href="./admin-panel/demo/pages/forms/<?php echo $list['image']?>" class="img-gal" target="_blank">
				<div class="mask">
					 <h2><?php echo $list['title']?></h2>
					<p>Paper-Code : <?php echo $list['paper_code']?>  </br>
					Date-Posted : <?php echo $list['date_posted']?></p>
					<a href="./admin-panel/demo/pages/forms/<?php echo $list['image']?>" class="info" download>Download</a>
			  </div>  </a>    
                
				</div>			
    						
				</div>
    		 
							<?php } ?>
			
			<?php } else { 
			    echo "Question Papers are currently NOT Available in this Semester!!!...";
			}?>
			
			
    	</div>
              
        </div>
	</div>						
				
		
    <!--================ End Department Area =================-->

    

  
   
<!--================ Start footer Area  =================-->
<?php
include_once 'include/footer.php' ;
?>
	
</body>

</html>