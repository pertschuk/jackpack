<?php

$name = $_POST['new'];

require "config.php";
$con= mysqli_connect($database,$user,$password, 'bhsjacke_jackpack');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "INSERT INTO issues (name) VALUES ('$name') ";
  mysqli_query($con, $sql);
  //header("Location: /index.php?message=Success" );



?>
