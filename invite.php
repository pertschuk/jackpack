<?php
require 'header.php';
require 'PHPMailerAutoload.php';

function send ($to, $tkn) {
    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'cardigan.bhsjacket@gmail.com';                            // SMTP username
    $mail->Password = 'OG8cB:;{`kc';                           // SMTP password
    $mail->SMTPSecure = 'tls';    
    $mail->Port = 587;
    $mail->setFrom('cardigan.bhsjacket@gmail.com', 'JackPack');
    $mail->FromName = 'JackPack';
    $mail->addAddress($to);   
    $mail->isHTML(true); 
    $mail->Subject = 'Join JackPack!';
    $mail->Body    = "You have been invite to join JackPack, the open source Newsprint management platform. <br/> Please follow <a href='http://localhost?token=" . $tkn . "'>this</a> link to join.";

    if(!$mail->send()) {
       echo 'Message could not be sent.';
       echo 'Mailer Error: ' . $mail->ErrorInfo;
       return FALSE;
}
   else {return TRUE; }


}


$con= mysqli_connect($database,$user,$password, 'bhsjacke_jackpack');
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