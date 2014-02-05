<? require 'header.php';
$issue = $_GET['issue'];
?>

<div class="row"><div class="span16">
<h1 class="page-header">Issue for <? echo $issue; ?></h1>

 <?//if $latest_issue.id != @issue.id: ?>
<fieldset>
<form action="createdoc.php" method="post">
    <input type ="hidden" name ="issue" value ="<? echo $issue; ?>">
    <div class ="clearfix">
        <div class="clearfix"> 
           <div class="clearfix">
    <label for="document[title]">Story:</label>
    <div class="input">
      <input type="text" name="title" value="" id="document-title" class="xxlarge">
    </div>
  </div>
            <div class="clearfix">
    <label for="document[section]">Section:</label>
    <div class="input"><select name="section" id="document-section" class=""><option value="news">News</option><option value="opinion">Opinion</option><option value="features">Features</option><option value="entertainment">Entertainment</option><option value="sports">Sports</option></select></div>
  </div>
            <div class="clearfix">
    <label for="document[user_id]">Assignment:</label>
    <div class="input"><select name="id" id="document-user_id" class="alph"> 
 <? if ($result = $con->query("SELECT first,last FROM Users")) {
    while ($users = $result->fetch_assoc()) { ?><option value ="<? echo $users['id']; ?>"><? echo $users['first'] . " " . $users['last']; ?></option><? } } ?></select>
  </div>
        </div>
        </div>
    </div>
    <div class="actions">
    <input type="submit" name="op" value="Submit" id="document-submit" class="btn primary">
    
  </div>
            </form>
</fieldset>

<? foreach ($sections as $section) {?>
<h3><? echo $section; ?></h3>
<table class="bordered-table zebra-striped">
  <thead>
  <tr>
    <th>Story</th>
    <th>Detailed Description & Contacts</th>
    <th>Status</th>
    <th>Editor</th>
    <th>Writer</th>
    <th>Visual</th>
  </tr>
  </thead>
  <tbody>
      <? if ($result = $con->query("SELECT * FROM document WHERE section='$section' AND issue_id='$issue'")) {
    while ($doc = $result->fetch_assoc()) { ?>
  <tr class="<? if ($c++ % 2 == 1) { echo "even";}  else { echo "odd"; } ?>">
    <td><a href="/document/<? echo $doc['id']; ?>/edit"><strong><? echo $doc['title']; ?></strong><a></td>
    <td><? echo $doc['contact']; ?></td>  
    <td>
      <? if ($doc['state'] == 'new'){ 
          echo $doc['state'];
      }
      else { ?>
        <a href="/document/<%= document.id %>/google"><? echo $doc['state']; ?></a>
      <? } ?>
    </td>
    <td><? echo $doc['editor_id']; ?></td>
    <td><strong><? getUser($doc['user_id']); ?></strong><br />
      <%= document.user.phone %><br />
      <%= document.user.email %></td>
    <td>
      <%= @capitalize document.visual %>
      <% if document.photographer: %>
        <br /><strong><%= document.photographer.name %></strong>
      <% end %>
    </td>
  </tr><? } ?>
  </tbody>
</table>
<? } }?>
</div></div>

