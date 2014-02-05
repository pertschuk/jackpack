<?php 
$cur = "Users";
require "header.php";
//$con= mysqli_connect($database,$user,$password, 'bhsjacke_jackpack');

  ?>
<div class="row">
  <div class="span16">
    <fieldset><legend>Invite</legend>
      <div class="clearfix">
        <label for="email">Email:</label>
        <div class="input">
          <input type="text" name="email" value="" id="authtoken-email" class="undefined">
        </div>
      </div>
      <div class="clearfix">
        <label for="role">Role:</label>
        <div class="input">
            <select name="authtoken[role]" id="authtoken-role" class="medium">
                <option value="writer">Writer</option>
                <option value="photographer">Photographer</option>
                <option value="editor">Editor</option>
                <option value="illustrator">Illustrator</option>
            </select></div>
      </div>
      <div class="actions">
        <button>Submit</button>
      </div>
    </fieldset>
  </div>
</div>

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