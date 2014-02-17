<? require 'header.php';
$issue = $_GET['issue'];
?>

<div class="row"><div class="span16">
<h1 class="page-header">Issue for <? echo $issues[$issue-1]; ?></h1>

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
    <div class="input"><select name="uid" id="document-user_id" class="alph"> 
 <? if ($result = $con->query("SELECT pid,first,last FROM Users")) {
    while ($users = $result->fetch_assoc()) { ?><option value ="<? echo $users['pid']; ?>"><? echo $users['first'] . " " . $users['last']; ?></option><? } } ?></select>
  </div>
        </div>
            <div class="clearfix">
    <label for="document[user_id]">Editor:</label>
    <div class="input"><select name="editor" id="document-user_id" class="alph"> 
 <? if ($result = $con->query("SELECT pid,first,last FROM Users WHERE role='editor'")) {
    while ($users = $result->fetch_assoc()) { ?><option value ="<? echo $users['pid']; ?>"><? echo $users['first'] . " " . $users['last']; ?></option><? } } ?></select>
  </div>
        </div>
            <div class="clearfix">
    <label for="document[contact]">Detailed Description &amp; Contacts:</label>
    <div class="input"><textarea name="description" id="document-contact" class="xlarge"></textarea></div>
  </div>
            <div class="clearfix">
    <label for="document[visual]">Visual:</label>
    <div class="input">
      <ul class="inputs-list "><li><label><input type="radio" name="visual" value="illustration" checked=""><span>Illustration</span></label></li><li><label><input type="radio" name="document[visual]" value="photo"><span>Photo</span></label></li><li><label><input type="radio" name="document[visual]" value="none"><span>None</span></label></li></ul>
      
    </div>
  </div>
            <div class="clearfix" id="document-state-wrapper">
    <label for="document[state]">State:</label>
    <div class="input"><select name="state" id="document-state" class=""><option value="new" selected="selected">Not started</option><option value="progress">In progress</option><option value="editing1">Editing first draft</option><option value="revising">Revising</option><option value="editing2">Editing final draft</option><option value="copy">Copy editing</option><option value="done">Done</option></select></div>
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
    <th>Grade</th>
  </tr>
  </thead>
  <tbody>
      <? if ($result = $con->query("SELECT * FROM document WHERE section='$section' AND issue_id='$issue'")) {
    while ($doc = $result->fetch_assoc()) { ?>
  <tr class="<? if ($c++ % 2 == 1) { echo "even";}  else { echo "odd"; } ?>">
    <td><a href="/edit?id=<? echo $doc['id']; ?>"><strong><? echo $doc['title']; ?></strong><a></td>
    <td><? echo $doc['contact']; ?></td>  
    <td>
      

        <a href="google.php?id=<? echo $doc['id']; ?>&title=<? echo $doc['title']; ?>&gdoc=<? echo $doc['google_docs']; ?>"><? echo $doc['state']; ?></a>
    </td>
    <td><?  echo getUser($doc['editor_id'],$con); ?></td>
    <td><strong><? echo getUser($doc['user_id'],$con); ?></strong><br /></td>
    <td>
      <? echo $doc['visual']; ?>
        <br /><strong></strong>
    </td>
    <td> <a href ="/grade">Enter Grade</a> </td>
  </tr><? } ?>
  </tbody>
</table>
<? } }?>
</div></div>

