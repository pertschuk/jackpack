<?php
# Logging in with Google accounts requires setting special identity, so this example shows how to do it.
session_start();
require 'config.php';
require 'openid.php';
$con= mysqli_connect($database,$user,$password, 'bhsjacke_jackpack');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
try {
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID($public);
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->identity = 'https://www.google.com/accounts/o8/id';
            header('Location: ' . $openid->authUrl());
        }
    } elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
        $openid->validate(); //validate google user
          $sql = "SELECT * FROM Users WHERE openid = '" . $openid->identity . "'";
          $res = mysqli_query($con, $sql);
          $row = mysqli_fetch_array($res);
          if($row['openid']) {
              $_SESSION['openid'] = $row['openid'];
              $_SESSION['role'] = $row['role'];
              $_SESSION['name'] = $row['first'] . " " . $row['last'];
              $_SESSION['uid'] = $row['PID'];
              header('Location: /' );
          }
          elseif (isset($_SESSION['token'])) { 
              $token = $_SESSION['token'];
              $query = "SELECT * FROM auth_tokens WHERE token = '$token' ";
              $result = mysqli_query($con, $query);
              mysqli_close($con);
              $row = mysqli_fetch_array($result);
              if (!$row['token']) { echo "Invalid token"; die(); }
              $email = $row['email'];
              $role = $row['role'];
              
              ?>
            <form action="create.php" method="post">
            <input type="hidden" name="openid" value="<?php echo $openid->identity; ?>">
            <input type="hidden" name="role" value="<?php echo $role; ?>">
            First Name: <input type="text" name="first"><br>
            Last Name: <input type="text" name="last"><br>
            Cell Phone: <input type="text" name="cell"><br>
            Email: <input type="text" name="email" value ="<?php echo $email; ?> "><br>
            <button>Submit</button>
    </form>
    <?php
          }
          else{ echo "Token required to log in"; }
        }

} catch(ErrorException $e) {
    echo $e->getMessage();
}
