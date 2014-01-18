<?php
$email = $_POST['email'];
$first = $_POST['first'];
$last = $_POST['last'];
$cell = $_POST['cell'];
$role = $_POST['role'];


require "config.php";
$con= mysqli_connect($database,$user,$password, 'bhsjacke_jackpack');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "UPDATE Users (email, first, last, phone, openid, role) VALUES ('$email', '$first', '$last', '$cell', '$openid', '$role') ";
  mysqli_query($con, $sql);
  header('Location: /auth.php' );


?>
