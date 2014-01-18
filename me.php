<?php
$cur = "Edit Profile";
require "header.php";
?>
<head> 
      <title>Edit Profile</title>
      <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
      <link rel="stylesheet" href="/css/style.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
      <script type="text/javascript" charset="utf-8" src="/js/jquery-1.7.1.min.js"></script>
      <script type="text/javascript" charset="utf-8" src="/js/bootstrap-modal.js"></script>
      <script type="text/javascript" charset="utf-8" src="/js/bootstrap-dropdown.js"></script>
      <script type="text/javascript" charset="utf-8" src="/js/bootstrap-alerts.js"></script>
      <script type="text/javascript" charset="utf-8" src="/js/script.js"></script>
</head>
<form action="update.php" method="post">
    <div class ="clearfix"><input type="hidden" name="openid" value="<?php echo $_SESSION['openid']; ?>">
            <input type="hidden" name="role" value="<?php echo $_SESSION['role']; ?>">
            First Name: <input type="text" name="first"><br>
            Last Name: <input type="text" name="last"><br>
            Cell Phone: <input type="text" name="cell"><br>
            Email: <input type="text" name="email" value ="<?php //echo $email; ?> "><br>
            <div class='actions'><input type="submit" name="op" value="Submit" id="user-submit" class="btn primary"></div>
    </div>
    </form>
