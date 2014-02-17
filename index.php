<?php
            require 'header.php';
            $_SESSION['token'] = $_GET['token'];
            if(!isset($_SESSION['openid'])) {
                echo "<div class='center'><div class='span16'>
<a class='btnlogin' href='/auth.php?login'>Log in</a>
</div></div>";
                die();
            }
        ?>
        <div class="container">
      
      
<div class="row"><div class="span16"><h1 class="page-header">Pending assignments</h1></div></div>

<div class="row">
  
<?php 
$sql = "SELECT * FROM document WHERE user_id =" . $_SESSION['uid'] . " OR editor_id="  . $_SESSION['uid'];
if ($result = $con->query($sql)) {

    /* fetch associative array */
    while ($doc = $result->fetch_assoc()) {
?>
 
<div class="span8"><div class="document">
<h4>Test</h4>
<div class="row"><div class="span4">
<ul class="info">
  <li>Assigned to <strong><?php echo $doc['title']; ?></strong></li>
  <li>Status: <strong><?php echo $doc['state']; ?></strong></li>
  <li><strong><?php echo $doc['section']; ?></strong></li>
  <!--<li>Due <strong>in 4 days</strong></li>-->
  <li><a href="/edit.php?id=<?php echo $doc['id'] . "&section=" . $doc['section'] . "&uid=" . $doc['user_id'] . "&description=" . $doc['contact'] . "&title=" . $doc['title']; ?>"> Edit assignment</a></li>
</ul>
<div class="body">
  <? echo $contact; ?>
</div>
<div class="ops">
    <h5><a href="/google.php?id=<?php echo $doc['id']; ?>">
            Edit assignment View/Edit this document
    </a></h5>
  
</div>

</div></div>

</div></div> <?php } } ?>
    </div>
        </div>
    </body>
</html>
