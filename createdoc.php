<?php
require 'config.php';

$title = $_POST['title'];
$uid = $_POST['uid'];
$copy = $_POST['copy'];
$photo = $_POST['photo'];
$editor = $_POST['editor'];
$visual = $_POST['visual'];
$state = $_POST['state'];
$section = $_POST['section'];
$timestamp = time();


$con= mysqli_connect($database,$user,$password, 'bhsjacke_jackpack');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "INSERT INTO document (user_id, copy_editor, photographer_id, issue_id, state, section, visual, editor_id) VALUES ('$uid', '$copy', '$photo', '$issue', '$state', '$section') ";
  mysqli_query($con, $sql);
  //header('Location: /' );
?>
