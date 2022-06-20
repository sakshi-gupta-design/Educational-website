

<?php
//This code shows how to Upload And Insert Image Into Mysql Database Using Php Html.
	//connecting to uploadFile database.
		$conn = mysqli_connect("localhost", "root", "", "userregistration");
		if($conn) {
	//if connection has been established display connected.

	}


	if(isset($_POST['upload'])) {
	$filename = $_FILES['uploadfile']['name'];
	$tmpname = $_FILES['uploadfile']['tmp_name'];
	$folder ="usericon/".$filename;
	move_uploaded_file($tmpname, $folder);
	
	
	
	$sql = "insert into user_image (picsource) VALUES ('$folder')";
	$qry = mysqli_query($conn, $sql);
	
	}
?>