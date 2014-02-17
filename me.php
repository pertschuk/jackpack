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
            <input type="hidden" name="role" value="<?php echo $_SESSION['role']; $name = explode(' ',$_SESSION['name']); ?>">
            <div class ="clearfix"><label for='first'>First Name:</label>  <input id='first' type="text" name="first" value ="<? echo $name[0]; ?>"><br></div>
            <div class ="clearfix"><label for='last'>Last Name:</label>  <input type="text" name="last" value ="<? echo $name[1]; ?>"><br></div>
            <div class ="clearfix"><label for='cell'>Cell Phone:</label>  <input type="text" name="cell"><br></div>
            <div class ="clearfix"><label for='email'>Email:</label>  <input type="text" name="email" value ="<?php echo $_SESSION['email']; ?>"><br></div>
            <div class='actions'><input type="submit" name="op" value="Submit" id="user-submit" class="btn primary"></div>
    </div>
    </form>
