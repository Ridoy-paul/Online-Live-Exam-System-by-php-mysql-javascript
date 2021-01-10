<?php require_once("backend/config.php"); ?>
<?php include("header.php"); ?>
<?php include ("left-sidebar.php");?>

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <div><?php display_message() ?></div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-12">
           <div class="card">
               <div class="card-header">
                   <h3>Add question</h3>
               </div>
               <form method="post" id="insert_form">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Exam Name</label>
                                <select class="form-control" id="selectExam" name="examID" required>
                                    <option value="">Select Exam Name</option>
                                    <?php
                                    $query = query("SELECT * FROM exam WHERE action = 'SHOW' ORDER BY id DESC");
                                    confirm($query);
                                    $rows = mysqli_num_rows($query);
                                    if($rows > 0){
                                        while($row = fetch_array($query)){
                                        ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                       
        <?php
                                     
                                    }
                                    
                                }
        ?>
                                </select>
                            </div>
                    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail" class="col-form-label">Question number</label>
                                <div class="" id="questionNumber">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Question Text</label>
                        <input type="text" name="question_text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Choice 1</label>
                        <input type="text" name="choice1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Choice 2</label>
                        <input type="text" name="choice2" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Choice 3</label>
                        <input type="text" name="choice3" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Choice 4</label>
                        <input type="text" name="choice4" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                                 <label for="exampleInputEmail1">Corrent Ans</label>
                        <div class="form-check form-check-inline bg-primary" style="padding: 5px 10px; border: 1px solid red; border-radius: 10px; margin-left: 10px;">
                             <input class="form-check-input" type="radio" name="correctAns" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1"><b>Option 1</b></label>
                        </div>
                        <div class="form-check form-check-inline bg-primary" style="padding: 5px 10px; border: 1px solid red; border-radius: 10px;">
                                <input class="form-check-input" type="radio" name="correctAns" id="inlineRadio2" value="2">
                                <label class="form-check-label" for="inlineRadio2"><b>Option 2</b></label>
                        </div>
                        <div class="form-check form-check-inline bg-primary" style="padding: 5px 10px; border: 1px solid red; border-radius: 10px;">
                                <input class="form-check-input" type="radio" name="correctAns" id="inlineRadio3" value="3">
                                <label class="form-check-label" for="inlineRadio3"><b>Option 3</b></label>
                        </div>
                        <div class="form-check form-check-inline bg-primary" style="padding: 5px 10px; border: 1px solid red; border-radius: 10px;">
                                <input class="form-check-input" type="radio" name="correctAns" id="inlineRadio4" value="4">
                                <label class="form-check-label" for="inlineRadio4"><b>Option 4</b></label>
                        </div>
                        
                            </div>   
                             <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mark of This Question</label>
                                <input type="number" name="markOfQuestion" class="form-control" placeholder="EX: 1" value="" step=any  required>
                            </div>
                    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Negative Mark of this question</label>
                                <input type="number" name="negativeMark" class="form-control" placeholder="EX: -1"step=any  required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                                <label for="">Right Ans Description</label>
                                <textarea id="" class="form-control" name="rightAnsDes" row="50"  required></textarea>
                            </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input  type="submit" name="add" id="insert" value="Add Question" class="btn btn-success form-control">
                </div>
              </form>
             
            </div>
            </div>
             
            
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

      
 <!-- footer Start -->
            <?php include("footer.php"); ?>
         
         
<!--check Bank Balance Start-->
<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch-ques-num-ajax.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#questionNumber').html(data);
			}
		});
	}
	
	$('#selectExam').change(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
<!--check Bank Balance End-->
   
   <?php
if (isset($_POST['add'])) {
        $question_number = escape_string($_POST['question_number']);
        $question_text = escape_string($_POST['question_text']);
        $examID = escape_string($_POST['examID']);
        
        $optn1 = escape_string($_POST['choice1']);
        $optn2 = escape_string($_POST['choice2']);
        $optn3 = escape_string($_POST['choice3']);
        $optn4 = escape_string($_POST['choice4']);
        
        $correct_choice = escape_string($_POST['correctAns']);
        
        $mark = escape_string($_POST['markOfQuestion']);
        $negativeMark = escape_string($_POST['negativeMark']);
        $rightAnsDes = escape_string($_POST['rightAnsDes']);
        
        
        $questionExistCheckQ = query("SELECT * FROM questions WHERE examID='$examID' AND  questionName='$question_text'");
        confirm($questionExistCheckQ);
        $rowOfQQ= fetch_array($questionExistCheckQ);
        $QuesName = $rowOfQQ['id'];
        
        if(empty($QuesName)){
            $query = query("INSERT INTO questions(examID, questionName, question_number, firstOptn, secondOptn, thirdOptn, fourthOptn, rightAns, mark, negativeMark, rightAnsDes) VALUES('$examID', '$question_text','$question_number', '$optn1', '$optn2', '$optn3', '$optn4', '$correct_choice', '$mark', '$negativeMark', '$rightAnsDes')");
            confirm($query);
            if($query){
                $epdateNum = $question_number+1;
                $updateExamQuery = query("UPDATE exam SET minQuestionNum= '$epdateNum' WHERE id='$examID'");
                confirm($updateExamQuery);
                
                set_message('<h2 class="m-0 text-dark bg-primary text-center" style="padding: 10px; border-radius: 20px;">New Question Added</h2>');
                redirect("add-question.php");
                
                
            }
        }
        else{
            set_message('<h2 class="m-0 text-dark bg-danger text-center" style="padding: 10px; border-radius: 20px;">Warning!!! This Question is exist</h2>');
            redirect("add-question.php");
        }
                      
        

// if($query)
// {
//     // text for $value
//     foreach($choice as $option => $value)
//     {
//         if($value !="")
//         {
//          if($correct_choice == $option)
//          {
//             $is_correct=1; 
//          }
//          else
//          {
//             $is_correct=0; 
//          }
//         //  second query for choice
//             $query_options = query("INSERT INTO options(question_number,is_correct,options) VALUES('$question_number', '$is_correct','$value')");
//             confirm($query_options);
//             if($query_options)
//             {
//                 set_message('<h2 class="m-0 text-dark bg-primary text-center" style="padding: 10px; border-radius: 20px;">Question Added </h2>');
//             }
//         }
//     }
//  set_message('<h2 class="m-0 text-dark bg-primary text-center" style="padding: 10px; border-radius: 20px;">New Course Added</h2>');
// redirect("all-exam.php");
        
    // }
}    
    // $query_question=query("select * from questions");
    // $total=mysqli_num_rows($query_question);
    // $next=$total+1;

?>
            
             <!-- footer End -->