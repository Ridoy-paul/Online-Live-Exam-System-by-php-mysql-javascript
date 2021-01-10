<?php require_once("backend/config.php"); ?>

<?php
if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            
            $rand=rand(1000,10000);
              
            $exm_name               = $getData[0];
            $exm_question_name      = $getData[1];
            $op1                    = $getData[2];
            $op2                    = $getData[3];
            $op3                    = $getData[4];
            $op4                    = $getData[5];
            $right_ans              = $getData[6];
            $mark                   = $getData[7];
            $negative_mark          = $getData[8];
            $right_ans_des          = $getData[9];
            
            //select
            // $course_qry=query("SELECT * FROM `course`");
            // $course_fetcy=fetch_array($course_qry);
            // $course_id=$course_fetcy['id'];
            
            //select exam
            $exam_query = query("SELECT * FROM exam WHERE name='$exm_name'");
            $exam_row = fetch_array($exam_query);
            $name=$exam_row['name'];
            $ex_id=$exam_row['id'];
            $minQuestionNum = $exam_row['minQuestionNum'];
            
            $updateQuestionNum = $minQuestionNum;
           
            $rows=mysqli_fetch_array($exam_query);
            if($name == $exm_name){
                
                $questionExistCheckQ = query("SELECT * FROM questions WHERE examID='$ex_id' AND  questionName='$exm_question_name'");
                confirm($questionExistCheckQ);
                $rowOfQQ= fetch_array($questionExistCheckQ);
                $quesID = $rowOfQQ['id'];
                
                if(empty($quesID)){
                        $query_for_Question = query("INSERT INTO questions(examID,questionName,question_number,firstOptn,secondOptn,thirdOptn,fourthOptn,rightAns,mark,negativeMark,rightAnsDes) VALUES('$ex_id','$exm_question_name','$updateQuestionNum','$op1','$op2','$op3','$op4','$right_ans','$mark','$negative_mark','$right_ans_des')");
                        $result=confirm($query_for_Question);
                        
                        if($query_for_Question){
                        $UpdateNum = $minQuestionNum+1;
                        $updateExamQuery = query("UPDATE exam SET minQuestionNum= '$UpdateNum' WHERE name='$exm_name'");
                        confirm($updateExamQuery);
                        
                        }
                        if(!isset($result)){
                        echo "<script type=\"text/javascript\">
                              alert(\"CSV File has been successfully Imported.\");
                              window.location = \"index.php\"
                              </script>";    
                        }
                        else{
                            set_message('Exam Doesn,t Match');
                            redirect("index.php");
                        }
                }
                
           
                    }
            // else{
            //     $up_date_question=query("UPDATE `questions` SET id=[val");
            
            // }
            
             $ss= substr(str_shuffle($getData[0]),0, 4).rand(0,3);
            
        
           }
      
           fclose($file);  
     }
  } 
?>