<?php require_once("backend/config.php"); ?>
<?php

if(isset($_POST["query"]))
{
   
    $search = $_POST["query"];
    
    
	$q = query("SELECT * FROM exam where id='$search'");
    confirm($q);
    $serchrow=fetch_array($q);
    $questionNum = $serchrow['minQuestionNum'];
       
    $output .= '<input type="text" name="question_number" id="question_number" class="form-control" value="'.$questionNum.'" readonly>';
        
        echo $output;
            
    }

?>
