
<?php include 'sendemail.php';
 ?>


<?php


 $con = mysqli_connect('localhost','root') ;

mysqli_select_db($con, 'admin_panel');

if((isset($_POST['name'])&& $_POST['name'] !='') && (isset($_POST['email'])&& $_POST['email'] !=''))
{
 

$name = $con->real_escape_string($_POST['name']);
$email = $con->real_escape_string($_POST['email']);
$comment = $con->real_escape_string($_POST['comment']);


$sql="INSERT INTO contact_us (name, email, comment) VALUES ('".$name."','".$email."', '".$comment."')";

if(!$result = $con->query($sql)){
die('There was an error running the query [' . $con->error . ']');
}

}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/favi1.ico" type="image/ico">   
   <title>Contact Us-SDians Study Hotspot</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
  </head>
  <body>

    <!--alert messages start-->
    <?php echo $alert; ?>
    <!--alert messages end-->

    <!--contact section start-->
    <div class="contact-section">
      <div class="contact-info">
        <div><i class="fas fa-map-marker-alt"></i>Kasturba Institute Of Technology</div>
        <div><i class="fas fa-envelope"></i>edumistic@gmail.com</div>
        <div><i class="fas fa-phone"></i>+91 98xxxxxxxx</div>
        <div><i class="fas fa-clock"></i>Mon - Fri 8:00 AM to 5:00 PM</div>
      </div>
      <div class="contact-form">
        <h2>Contact Us</h2>
        <form class="contact" action="" method="post">
          <input type="text" name="name" class="text-box" placeholder="Your Name" required>
          <input type="email" name="email" class="text-box" placeholder="Your Email" required>
          <textarea name="comment" rows="5" placeholder="Your Message" required></textarea>
          <input type="submit" name="submit" class="send-btn" value="Send">
        </form>
      </div>
    </div>
    <!--contact section end-->

    <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>

  </body>
</html>