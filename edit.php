<? require_once 'header.php'; ?>
<fieldset>
<form action="createdoc.php?edit=1?id=<? echo $_GET['id']; ?>" method="post">
    <input type ="hidden" name ="issue" value ="<? echo $issue; ?>">
    <div class ="clearfix">
        <div class="clearfix"> 
           <div class="clearfix">
    <label for="document[title]">Story:</label>
    <div class="input">
      <input type="text" name="title" value="<? echo $_GET['title']; ?>" id="document-title" class="xxlarge">
    </div>
  </div>
            <div class="clearfix">
    <label for="document[section]">Section:</label>
    <div class="input"><select name="section" id="document-section" class="" value ="<? echo $_GET['section']; ?>"><option value="news">News</option><option value="opinion">Opinion</option><option value="features">Features</option><option value="entertainment">Entertainment</option><option value="sports">Sports</option></select></div>
  </div>
            <div class="clearfix">
    <label for="document[user_id]">Assignment:</label>
    <div class="input"><select name="uid" id="document-user_id" class="alph" value ="<? echo $_GET['uid']; ?>"> 
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
    <div class="input"><textarea name="description" id="document-contact" class="xlarge" value="<? echo $_GET['description']; ?>"></textarea></div>
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