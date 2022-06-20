<?php
session_start();
$con=mysqli_connect("localhost","root","","admin_panel");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/admin/');
define('SITE_PATH','http://127.0.0.1/php/admin/');


?>