<?php 
$cur = "Users";
require "header.php";
//$con= mysqli_connect($database,$user,$password, 'bhsjacke_jackpack');

  ?>
<form action="invite.php" method="post" id ="invite">
            <div class="clearfix"> Email: <input type="text" name="email"><br></div>
            <div class="clearfix"> Role : <select name ="role" form ="invite">
                <option value ="writer">Writer</option>
                <option value ="editor">Editor</option>
                <option value ="photographer">Photographer</option>
                <option value ="illustrator">Illustrator</option>
            </select></div>
            <div class="actions"><input type="submit" name="op" value="Submit" id="document-submit" class="btn primary"></div>
</form>

<div class="row">
<div class="span16">
  <h3>Users</h3>
  <table class="bordered-table zebra-striped">
    <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Role</th></tr></thead>
    <tbody>
    <?php 
    $c = 0; 
    $sql = "SELECT * FROM Users";
    if ($result = $con->query($sql)) {

    /* fetch associative array */
    while ($user = $result->fetch_assoc()) {
    ?>
      <tr class="<?php if ($c++ % 2 == 1) { echo "even";}  else { echo "odd";} ?>">
        <td><a href="/users/<?php echo $user['PID'];?>"><?php echo $user['first'] . " " . $user['last']; ?></a></td>
        <td><?php echo $user['email']; ?></td><td><?php echo $user['phone']; ?></td>
        <td><?php echo $user['role']; ?></td></tr>
    <?php } }?>
    </tbody>
  </table>
</div>
</div>
</body>