<?php
  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect("localhost", "root", "", "img-upload");
  if (isset($_POST['save_profile'])) {
    // for the database
    $bio = stripslashes($_POST['bio']);
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "images1/";
    $target_file = $target_dir .($profileImageName);
	
	$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 500000) {
      $msg = "Image size should not be greated than 500Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
	
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
	
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

	
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO users SET profile_image='$profileImageName', bio='$bio'" ;
        if(mysqli_query($conn, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
  }
?>