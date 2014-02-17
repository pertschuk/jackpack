<?php
require_once 'header.php';
?>
<fieldset> 
    <form action='grade.php' type ="post" > 
        
        <div class ="clearfix">
         <table>
             <thead>
                 <tr>
                    <th>Name</th>
                    <th>Section 1</th>
                    <th>Section 2</th>
                    <th>Section 3</th>
                    <th>Section 4</th>
                    <th>Section 5</th>
                 </tr>
             </thead>
             <tbody>
                 <? $sql = "SELECT * FROM document WHERE editor_id= " . $_SESSION['id'] . " ORDER BY timestamp"; 
                 $res = mysqli_query($con, $sql);
                 while ($row = mysqli_fetch_assoc($res)){ ?>
                 <tr> <td> <? echo getUser($row['user_id']) ?> </td><td><input type = "text" value="<? echo $row['section1']; ?>"></td><td><input type = "text" value="<? echo $row['section2']; ?>"></td><td><input type = "text" value="<? echo $row['section3']; ?>"></td><td><input type = "text" value="<? echo $row['section4']; ?>"></td><td><input type = "text" value="<? echo $row['section5']; ?>"></td></tr>
                 
                 <? } ?>        
    
        </tbody>
        
</table>
                    <div id ="clearfix"> 
                        <input type="submit">
            
        </div>
        </div>
    </form>
</fieldset>

    
    
    
    
    