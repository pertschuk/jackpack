<?php

require "header.php";
$con= mysqli_connect($database,$user,$password, 'bhsjacke_jackpack');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
  
  $sql="CREATE TABLE Users(PID INT NOT NULL AUTO_INCREMENT, 
   PRIMARY KEY(PID), 
   email CHAR(50),
   first CHAR(30),
   last CHAR(50),
   phone CHAR(20),
   openid CHAR(200),
   role CHAR(20))";
  if (mysqli_query($con,$sql)) { echo "Successfully created Users Database"; }
  
  $sql = "CREATE TABLE auth_tokens(token CHAR(50), email CHAR(50), role CHAR(20))";
  mysqli_query($con,$sql);
   
  
  $sql = "CREATE TABLE issues(PID INT NOT NULL AUTO_INCREMENT, 
   PRIMARY KEY(PID), name CHAR(50))";
  mysqli_query($con,$sql);
  
  $sql = "CREATE TABLE `bhsjacke_jackpack`.`document` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT,
  `copy_editor` INT,
  `photographer_id` INT,
  `issue_id` INT,
  `google_docs` TEXT,
  `state` TEXT,
  `section` TEXT,
  `title` TEXT,
  `contact` TEXT,
  `visual` TEXT,
  `timestamp` INT,
  `editor_id` INT,
  PRIMARY KEY (`id`)
)
CHARACTER SET utf8;";
  mysqli_query($con,$sql);
  mysqli_close($con);
?>
