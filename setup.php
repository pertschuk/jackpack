<?php
    require 'PHPMailerAutoload.php';
if ( !isset($_POST['email'])) {
    ?><form method="post" action="setup.php" >
        <label for="email">Admin Email:</label><input type ="text" id="email" name="email"> </input> 
        <div id="clearfix"><input type='submit'></input></div>
    </form>
    <?
    die();
}
require "header.php";
//$con= mysqli_connect($database,$user,$password, 'bhsjacke_jackpack');

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
  
  $sql = "CREATE TABLE document_sharing(doc INT, user INT )";
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

  
  //invite admin user
  function send ($to, $tkn) {
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = 2;
            //$mail->Debugoutput = 'html';
            //Set the hostname of the mail server
            $mail->Host = 'smtp.gmail.com';
            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;
            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';
            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;
            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = "cardigan.bhsjacket@gmail.com";
            //Password to use for SMTP authentication
            $mail->Password = "OG8cB:;{`kc";
            //Set who the message is to be sent from
            $mail->setFrom('cardigan.bhsjacket@gmail.com', $brand);
            $mail->setFrom($guser, $brand);
            $mail->addAddress($to);   
            $mail->isHTML(true); 
            $mail->Subject = 'Welcome to ' . $brand;
            $mail->Body    = "You have just set up " . $brand . ", the open source Newsprint management platform. <br/> Please follow <a href='http://localhost?token=" . $tkn . "'>this</a> link to continue setup.";

            if(!$mail->send()) {
               echo 'Message could not be sent.';
               echo 'Mailer Error: ' . $mail->ErrorInfo;
               return FALSE;
        }
           else {return TRUE; }


        }
  $email = $_POST['email'];
  $token = sha1($email);
  $role = "editor";
  echo $email . $token . $role;
  $sql = "INSERT INTO auth_tokens VALUES ('$token','$email','$role')";
  if (send($email, $token)) {
  $res = mysqli_query($con, $sql);
  echo "Setup Completed. <a href = index.php> return</a>";
  }
  
  mysqli_query($con,$sql);
  mysqli_close($con);
  
  
?>
