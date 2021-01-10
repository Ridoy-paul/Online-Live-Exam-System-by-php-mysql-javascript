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
<?php
 $quesID = $_GET['quesID'];
 //echo $quesID;
 
 $quesQuery = query("SELECT * FROM questions WHERE id='$quesID'");
 confirm($quesQuery);
 $rowOfQuestion = fetch_array($quesQuery);
 
?>
            <div class="col-12">
           <div class="card">
               <div class="card-header">
                   <h3>Edit question</h3>
               </div>
               <form method="post" id="insert_form">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Question Text</label>
                        <textarea id="" class="form-control" name="question_text" row="50"  required><?php echo $rowOfQuestion['questionName'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Choice 1</label>
                        <input type="text" name="choice1" class="form-control" value="<?php echo $rowOfQuestion['firstOptn'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Choice 2</label>
                        <input type="text" name="choice2" class="form-control" value="<?php echo $rowOfQuestion['secondOptn'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Choice 3</label>
                        <input type="text" name="choice3" class="form-control" value="<?php echo $rowOfQuestion['thirdOptn'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Choice 4</label>
                        <input type="text" name="choice4" class="form-control" value="<?php echo $rowOfQuestion['fourthOptn'];?>"  required>
                    </div>
                    <div class="form-group">
                                 <label for="exampleInputEmail1">Corrent Ans</label>
                        <div class="form-check form-check-inline bg-primary" style="padding: 5px 10px; border: 1px solid red; border-radius: 10px; margin-left: 10px;">
                             <input class="form-check-input" type="radio" name="correctAns" id="inlineRadio1" value="1" <?php if($rowOfQuestion['rightAns'] == 1){ echo "checked";}?>>
                                <label class="form-check-label" for="inlineRadio1"><b>Option 1</b></label>
                        </div>
                        <div class="form-check form-check-inline bg-primary" style="padding: 5px 10px; border: 1px solid red; border-radius: 10px;">
                                <input class="form-check-input" type="radio" name="correctAns" id="inlineRadio2" value="2" <?php if($rowOfQuestion['rightAns'] == 2){ echo "checked";}?>>
                                <label class="form-check-label" for="inlineRadio2"><b>Option 2</b></label>
                        </div>
                        <div class="form-check form-check-inline bg-primary" style="padding: 5px 10px; border: 1px solid red; border-radius: 10px;">
                                <input class="form-check-input" type="radio" name="correctAns" id="inlineRadio3" value="3" <?php if($rowOfQuestion['rightAns'] == 3){ echo "checked";}?>>
                                <label class="form-check-label" for="inlineRadio3"><b>Option 3</b></label>
                        </div>
                        <div class="form-check form-check-inline bg-primary" style="padding: 5px 10px; border: 1px solid red; border-radius: 10px;">
                                <input class="form-check-input" type="radio" name="correctAns" id="inlineRadio4" value="4" <?php if($rowOfQuestion['rightAns'] == 4){ echo "checked";}?>>
                                <label class="form-check-label" for="inlineRadio4"><b>Option 4</b></label>
                        </div>
                            </div>   
                             <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mark of This Question</label>
                                <input type="number" name="markOfQuestion" class="form-control" placeholder="EX: 1"  step=any  value="<?php echo $rowOfQuestion['mark'];?>"   required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Negative Mark of this question</label>
                                <input type="number" name="negativeMark" class="form-control" placeholder="EX: -1"step=any  value="<?php echo $rowOfQuestion['negativeMark'];?>"   required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                                <label for="">Right Ans Description</label>
                                <textarea id="" class="form-control" name="rightAnsDes" row="50"  required><?php echo $rowOfQuestion['rightAnsDes'];?></textarea>
                            </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input  type="submit" name="editQuestion" id="insert" value="Update Question" class="btn btn-success form-control">
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
  
   <?php
if (isset($_POST['editQuestion'])) {
     $quesID = $_GET['quesID'];
    
//$question_number = escape_string($_POST['question_number']);
$question_text = escape_string($_POST['question_text']);
//$examID = escape_string($_POST['examID']);

$optn1 = escape_string($_POST['choice1']);
$optn2 = escape_string($_POST['choice2']);
$optn3 = escape_string($_POST['choice3']);
$optn4 = escape_string($_POST['choice4']);

$correct_choice = escape_string($_POST['correctAns']);

$mark = escape_string($_POST['markOfQuestion']);
$negativeMark = escape_string($_POST['negativeMark']);
$rightAnsDes = escape_string($_POST['rightAnsDes']);


               
$query = query("UPDATE questions SET questionName='$question_text', firstOptn='$optn1', secondOptn='$optn2', thirdOptn='$optn3', fourthOptn='$optn4', rightAns='$correct_choice', mark='$mark', negativeMark='$negativeMark', rightAnsDes='$rightAnsDes' WHERE id='$quesID'");
confirm($query);
if($query){
    set_message('<h2 class="m-0 text-dark bg-primary text-center" style="padding: 10px; border-radius: 20px;">Question Updated</h2>');
    redirect("all-exam.php");
    
    
}


}    
    
?>
            
             <!-- footer End -->