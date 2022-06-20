
<?php



 $con = mysqli_connect('localhost','root') ;

mysqli_select_db($con, 'userregistration');


if($con){
	?>
	
	<script>
	alert ("Connection succesful");
	</script>
	
	<?php
} else{
	 ?>
	
	<script>
	alert ("NO Connection");
	</script>

<?php
}


?>



























