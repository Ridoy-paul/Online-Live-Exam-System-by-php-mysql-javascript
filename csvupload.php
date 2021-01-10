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
              
            $std_name = $getData[0];
            $std_pass = $getData[1];
            $std_phn =$getData[2];
            $std_email = $getData[3];
            $std_Approve = $getData[4];
            // md5 pass
            $mdPass = md5($std_pass);
            
            $gmail_query = query("SELECT * FROM students WHERE email = '$std_email'");
            confirm($gmail_query);
            $std_row = fetch_array($gmail_query);
            $database_gmail = $std_row['email'];
            if($database_gmail == $std_email){
            echo "<script type=\"text/javascript\">
                  alert(\"Email is exists, Please try again with another Email.\");
                  window.location = \"index.php\"
                  </script>";
            }
            else{
            $query_for_student = query("INSERT INTO students(name, without_md5, pass_md5, phone, email,status) VALUES('$std_name', '$std_pass', '$mdPass', '$std_phn', '$std_email','Accepted')");
            $result=confirm($query_for_student);
            if(!isset($result))
            {
            echo "<script type=\"text/javascript\">
                  alert(\"CSV File has been successfully Imported.\");
                  window.location = \"index.php\"
                  </script>";    
            }
            }
            
            
                    
                   
                    
                    
     
         $ss= substr(str_shuffle($getData[0]),0, 4).rand(0,3);
            
                
                   
        
        
           }
      
           fclose($file);  
     }
  } 
?>