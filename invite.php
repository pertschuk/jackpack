<?php
require 'header.php';
require 'PHPMailerAutoload.php';

function send ($to, $tkn) {
                //Create a new PHPMailer instance
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
            $mail->Subject = 'Join ' . $brand;
            $mail->Body    = "You have been invited to join " . $brand . ", the open source Newsprint management platform. <br/> Please follow <a href='" . $public . "?token=" . $tkn . "'>this</a> link to join.";

            if(!$mail->send()) {
               echo 'Message could not be sent.';
               echo 'Mailer Error: ' . $mail->ErrorInfo;
               return FALSE;
        }
           else {return TRUE; }


        }


//$con= mysqli_connect($database,$user,$password, 'bhsjacke_jackpack');
// Check connection
if (mysqli_connect_errno())
  {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $email = $_POST['email'];
  $token = sha1($email);
  $role = $_POST['role'];
  echo $email . $token . $role;
  $sql = "INSERT INTO auth_tokens VALUES ('$token','$email','$role')";
  if (send($email, $token)) {
  $res = mysqli_query($con, $sql);
  echo "User invited. <a href = index.php> return</a>";
  }
      
  else { echo "Failed to invite user"; }
?>