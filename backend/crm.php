<?php 


include("functions.php"); 


extract($_POST);


/*
// CRM Table Start
if(isset($_POST['readrecordContact'])){
    $data ='<table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Company Id</th>
                    <th>Action</th>
                  </tr>
                  </thead>';
    
    $query = query("SELECT * FROM contact_person ORDER BY id DESC");
    confirm($query);
    $rows = mysqli_num_rows($query);
    if($rows > 0){
        $i = 1;
        while($row = fetch_array($query)){
            $data .='<tr>
                               <td>'.$i.'</td>
                               <td>
                                   <a href="">'.$row['Name'].'</a>
                               </td>
                               <td>'.$row['position'].'</td>
                                <td>'.$row['phone'].'</td>
                               <td>'.$row['email'].'</td>
                               <td>'.$row['company_id'].'</td>
                                <td>
                                               <abbr title="Click to Edit" class="text-success">
                                 <i onclick="EditPerson('.$row['id'].')"  class="far fa-edit btn btn-sm btn-primary"></i></abbr>
                                              <abbr title="Click to Delete" class="text-success">
                                 <a onclick="DeletePerson('.$row['id'].')" href=""><i class="fas fa-eye-slash btn btn-sm btn-danger"></i></a></abbr>
                              </td>
                    </tr>';
            $i++;
                
        }
        
        
}
    $data .= '</table>';
   
    echo $data;
  
    
}

// CRM Table End

*/



//CRM insert Start

if(isset($_POST['name']) && isset($_POST['position']) && isset($_POST['phone']) && isset($_POST['gmail']) && isset($_POST['userName']) && isset($_POST['password'])){
    $type = "User";
    $query = query("INSERT INTO admin(name, position, phone, gmail, username, password, type) VALUES('$name', '$position', '$phone', '$gmail', '$userName', '$password', '$type')");
    confirm($query);
    
}

//CRM insert End

//CRM Delete Start

if(isset($_POST['deleteid'])){
    $CRMid = $_POST['deleteid'];
    $query = query("DELETE FROM admin WHERE id ='$CRMid'");
    confirm($query);
    
}

//CRM Delete End

//CRM Edit Start

if(isset($_POST['id']) && isset($_POST['id']) != ""){
    $CRM = $_POST['id'];
    $query = query("SELECT * FROM admin WHERE id = '$CRM'");
    if(!$query){
        exit(mysqli_error());
    }
    $response = array();
    
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $response = $row;
        }
    }
    else{
        $response['status'] = 200;
        $response['message'] = "Data Not Found";
    }
    
    echo json_encode($response);
}
else{
        $response['status'] = 200;
        $response['message'] = "Data Not Found";
    }


// update data
if(isset($_POST['hidden_id'])){
    $hidden_id = $_POST['hidden_id'];
    $update_name = $_POST['update_name'];
    $update_position = $_POST['update_position'];
    $update_phone = $_POST['update_phone'];
    $update_gmail = $_POST['update_gmail'];
    $update_userName = $_POST['update_userName'];
    $update_password = $_POST['update_password'];
    
    $query = query("UPDATE `admin` SET `name`='$update_name',`position`='$update_position',`phone`='$update_phone',`gmail`='$update_gmail',`username`='$update_userName',`password`='$update_password' WHERE id = '$hidden_id'");
}

//CRM Edit End




?>