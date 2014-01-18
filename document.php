<?php
require 'header.php';

if( $_GET['mode'] == 'edit') {
  $sql = "SELECT FROM document WHERE id=" . $_GET['id'];
  $res = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($res);
?>
<div class="row"><div class="span12">

<form method="post">
<fieldset>
  <legend>Edit assignment</legend>
  <div class="clearfix">
    <label for="document[title]">Story:</label>
    <div class="input">
      <input type="text" name="document[title]" value="<?php echo $doc['title'];?>" id="document-title" class="xxlarge">
      
    </div>
  </div>
  <div class="clearfix">
    <label for="document[section]">Section:</label>
    <div class="input"><select name="document[section]" id="document-section" class=""><option value="news" selected="selected">News</option><option value="opinion">Opinion</option><option value="features">Features</option><option value="entertainment">Entertainment</option><option value="sports">Sports</option></select></div>
  </div>
  <div class="clearfix">
  <script type="text/javascript">
        function sortList(ul){
            var new_ul = ul.cloneNode(false);
            var lis = [];
            for(var i = ul.childNodes.length; i--;){
                if(ul.childNodes[i].nodeName === 'OPTION')
                    lis.push(ul.childNodes[i]);
            }
            lis.sort(function(a, b) {
              if( a.text.charAt(0) > b.text.charAt(0)) {return 1;}
              if( b.text.charAt(0) > a.text.charAt(0)) {return -1;}
              else{ return 0; } 
            });
            for(var i = 0; i < lis.length; i++)
                new_ul.appendChild(lis[i]);
            ul.parentNode.replaceChild(new_ul, ul);
        }
    </script>
    <label for="document[user_id]">Assignment:</label>
    <div class="input"><select name="document[user_id]" id="document-user_id" class="alph"><option value="79">Alexandra Dove</option><option value="513">Alexandra Barish</option><option value="46">Ashley Alexander</option><option value="207">Asa Burroughs</option><option value="55">Abigail Chaver</option><option value="302">Ari Ball-Burack</option><option value="450">Adrienne Sontag-Murphy</option><option value="62">Aliza Levin</option><option value="209">Alborz Yazdi</option><option value="511">Alissa Guther</option><option value="426">Aminta Gueye</option><option value="406">Ariel Gizzi</option><option value="420">Ava Mohsenin</option><option value="81">Bowen Johnson</option><option value="427">Cooper Price</option><option value="415">Celia Alter</option><option value="441">Cassady Bogatin</option><option value="27">Dmitri Gaskin</option><option value="255">Dharini Rasiah</option><option value="96">Esther R-A</option><option value="114">Eli Davey</option><option value="94">Emma Tasini-Koger</option><option value="115">Elinor Holland</option><option value="398">Erin Hoynes</option><option value="98">Emma Dudley</option><option value="99">Flynn Buxton-Walsh</option><option value="122">Farah Otero-Amad</option><option value="36">Frankie Whitty</option><option value="208">Goat Lover</option><option value="425">Giulia Chiappetta</option><option value="423">Gary Vincent</option><option value="61">Hannah Herman</option><option value="458">Izzy ben Izzy</option><option value="263">Ian Nielsen</option><option value="510">Ivy Olesen</option><option value="374">John "Straight-Up-Groovy" MacKay</option><option value="42">Julia Clark-Riddell</option><option value="138">James Weaver</option><option value="409">Julian Shen-Berro</option><option value="445">Jake Price</option><option value="76">Juliette Mueller</option><option value="35">Julian Morris-Walker</option><option value="399">Jack Pertschuk</option><option value="527" selected="selected">Jack Pertschuk</option><option value="397">Justine Cullinane</option><option value="245">Jesse Barber</option><option value="300">Kate Reed</option><option value="41">Kyle Daniels</option><option value="483">Kevin Flood-Bryzman</option><option value="49">Lev Facher</option><option value="60">Lily Gold</option><option value="479">Lucas fanning-Haag</option><option value="416">Louisa Mascuch</option><option value="51">Leah Henry</option><option value="53">Lev Marcus</option><option value="91">Lauren Messina-Douvos</option><option value="433">Leyla Farzaneh</option><option value="100">Mindy Ng</option><option value="297">Michael Hess</option><option value="120">Megan Hearst</option><option value="116">Miranda Taylor</option><option value="403">Milo W</option><option value="241">MIsha Brooks</option><option value="459">Madeleine Pauker</option><option value="410">Michael Mccabe</option><option value="457">Maura Lynch-Miller</option><option value="57">Mateo Garcia</option><option value="67">Meg McCabe</option><option value="448">Mateo Garcia</option><option value="242">Nancy Yu</option><option value="240">Nora Stanley</option><option value="443">Nadav Friedmann-Grunstein</option><option value="93">Nick Rio</option><option value="333">Nick Kiniris</option><option value="254">Noah Baker</option><option value="95">Nico Correia</option><option value="456">Sophie Craypo</option><option value="92">Shelby Aszklar</option><option value="442">Sonya Karabel</option><option value="432">Shan Warren</option><option value="298">Sarita Schreiber</option><option value="370">Sasha Barish</option><option value="75">Sera Busse</option><option value="408">Tom Battles</option><option value="50">Tyler Allen</option><option value="203">Tal August</option><option value="113">Tal Litwin</option><option value="460">samuel roditti</option><option value="424">sarah carlin</option></select></div>
    <script type="text/javascript"> sortList(document.getElementsByClassName('alph')[0]); </script>  
  </div>
  <div class="clearfix">
    <label for="document[editor_id]">Editor:</label>
    <div class="input"><select name="document[editor_id]" id="document-editor_id" class=""><option value="57" selected="selected">Mateo Garcia</option><option value="60">Lily Gold</option><option value="448">Mateo Garcia</option></select></div>
    <script type="text/javascript" charset="utf-8">$(function() { $.editors({"other":{"27":"Dmitri Gaskin","35":"Julian Morris-Walker","41":"Kyle Daniels","42":"Julia Clark-Riddell","55":"Abigail Chaver","79":"Alexandra Dove","203":"Tal August","207":"Asa Burroughs","255":"Dharini Rasiah","263":"Ian Nielsen","458":"Izzy ben Izzy","527":"Jack Pertschuk"},"features":{"62":"Aliza Levin","96":"Esther R-A"},"copy":{"49":"Lev Facher","50":"Tyler Allen","53":"Lev Marcus","138":"James Weaver","297":"Michael Hess","300":"Kate Reed","302":"Ari Ball-Burack"},"entertainment":{"46":"Ashley Alexander","76":"Juliette Mueller"},"opinion":{"98":"Emma Dudley","114":"Eli Davey"},"senior":{"36":"Frankie Whitty"},"photo":{"51":"Leah Henry"},"news":{"57":"Mateo Garcia","60":"Lily Gold","448":"Mateo Garcia"},"sports":{"67":"Meg McCabe"},"illustration":{"298":"Sarita Schreiber"}}, 57); });</script>
  </div>
  <div class="clearfix">
    <label for="document[contact]">Detailed Description &amp; Contacts:</label>
    <div class="input"><textarea name="document[contact]" id="document-contact" class="xlarge">ads</textarea></div>
  </div>
  <div class="clearfix">
    <label for="document[visual]">Visual:</label>
    <div class="input">
      <ul class="inputs-list "><li><label><input type="radio" name="document[visual]" value="illustration" checked=""><span>Illustration</span></label></li><li><label><input type="radio" name="document[visual]" value="photo"><span>Photo</span></label></li><li><label><input type="radio" name="document[visual]" value="none"><span>None</span></label></li></ul>
      
    </div>
  </div>
  <div class="clearfix" id="document-photographer-id-wrapper" style="display: none;">
    <label for="document[photographer_id]">Photographer:</label>
    <div class="input"><select name="document[photographer_id]" id="document-photographer_id" class=""><option value="0">- none -</option><option value="69">Nora Jang</option><option value="70">Luisa Pio</option><option value="71">Shakti Rajput</option><option value="72">Claire Hoch-Frohman</option><option value="73">Julia Murphy</option><option value="77">Amanda Hernandez- Sanchez</option><option value="78">Veronica Tien</option><option value="80">Anais Arias-Aragon</option><option value="97">Dana Sarfaty</option><option value="117">Aleksa Salve</option><option value="118">Emilio JN</option><option value="119">Leah YD</option><option value="121">Abby Gold</option><option value="175">Olivia Robertson</option></select></div>
  </div>
  <div class="clearfix" id="document-illustrator-id-wrapper">
    <label for="document[illustrator_id]">Illustrator:</label>
    <div class="input"><select name="document[photographer_id]" id="document-photographer_id" class=""><option value="0">- none -</option></select></div>
  </div>
  
  <div class="clearfix" id="document-state-wrapper">
    <label for="document[state]">State:</label>
    <div class="input"><select name="document[state]" id="document-state" class=""><option value="new" selected="selected">Not started</option><option value="progress">In progress</option><option value="editing1">Editing first draft</option><option value="revising">Revising</option><option value="editing2">Editing final draft</option><option value="copy">Copy editing</option><option value="done">Done</option></select></div>
  </div>
  <div class="clearfix" id="grade-wrapper">
   <label for="document[grade]">Grade:</label>
    <div class="input"><textarea id="document-grade" style="width:90px; height:25px;" placeholder="Coming soon"></textarea></div>
  </div>
  
  <div class="actions">
    <input type="submit" name="op" value="Submit" id="document-submit" class="btn primary">
    <a class="btn" href="/document/454/delete">Delete</a>
  </div>
</fieldset>
</form>

  </div><div class="span4">
  <div class="media-grid">
    
  </div>
  <button data-controls-modal="upload-form-454" data-backdrop="true" data-keyboard="true" class="btn">Upload an image</button>
<div id="upload-form-454" class="modal hide fade">
  <div class="modal-header">
    <a href="#" class="close">×</a>
    <h3>Upload an image to <em>Test</em></h3>
  </div>
  <form method="post" action="/document/454/upload" enctype="multipart/form-data">
  <div class="modal-body">
    <div class="clearfix">
      <label for="image">Image</label>
      <div class="input">
        <input type="file" name="image" id="image">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <input type="submit" name="op" value="Upload" id="op" class="btn primary">
  </div>
  </form>
</div>

  </div></div>
<?php } 

?>