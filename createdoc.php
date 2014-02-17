<?php
require 'config.php';

//for editing
$id = $_GET['id'];

$title = $_POST['title'];
$issue = $_POST['issue'];
$description = $_POST['description'];
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
  
   if (!$_GET['edit']) {$sql = "INSERT INTO document (title, user_id, copy_editor, photographer_id, issue_id, state, section, visual, editor_id, timestamp, contact) VALUES ('$title', '$uid', '$copy', '$photo', '$issue', '$state', '$section', '$visual', '$editor','$timestamp','$description') ";
   }
   elseif ($_GET['delete']) {
       $sql = "DELETE FROM document WHERE id '$id'";
   }
   else {
       $sql = "UPDATE document (title, user_id, copy_editor, photographer_id, issue_id, state, section, visual, editor_id, timestamp, contact) VALUES ('$title', '$uid', '$copy', '$photo', '$issue', '$state', '$section', '$visual', '$editor','$timestamp','$description') WHERE id='$id'";
   }
//echo $sql;
  mysqli_query($con, $sql);
  header('Location: /document' );
?>
