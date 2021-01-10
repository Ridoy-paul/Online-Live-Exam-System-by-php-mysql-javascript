<?php 

// Helper functions start
date_default_timezone_set('Asia/Dhaka');

function query($sql){
	global $connection;
	return mysqli_query($connection, $sql);
}

function fetch_array($array){

    return mysqli_fetch_array($array);
}


function confirm($result){
	global $connection;
	if (!$result) {
		die("Query Failed" . mysqli_error($result));
	}
}

function escape_string($string){
	global $connection;
	return mysqli_real_escape_string($connection, $string);
}

function set_message($msg){
	if (!empty($msg)) {
		$_SESSION['message'] = $msg;
	}
	else{
		$msg = "";
	}
}

function display_message(){
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function redirect($location){
	header("Location: $location");
}

// Helper functions end
// <!----------------------------------- Front Hand Functions & Queries Start ----------------------------->


/*
// <!------------------------------------------------- USER Registration START ------------------------------->

function user_reg(){
    if(isset($_POST['register'])){
        $name = escape_string($_POST['name']);
        $email = escape_string($_POST['email']);
        $phone = escape_string($_POST['phone']);
        $password = escape_string(md5($_POST['password']));

        $user_email = query("SELECT * FROM user_registration WHERE email = '$email'");
        confirm($user_email);
        $rows = mysqli_num_rows($user_email);
        if($rows > 0){
            set_message("This email is used, Please try again with another email");
        }
        else{
            $query = query("INSERT INTO user_registration(Name, email, phone, password) VALUES('$name',     '$email','$phone','$password')");
            confirm($query);
            
            $_SESSION['user_email'] = $email;
        
        } 
    }
    
}

// <!------------------------------------------------- USER Registration END ------------------------------->
*/


// <!----------------------------------- Back End Functions & Queries Start ----------------------------->


// <!----------------------------------------- Admin Login user START ------------------------------->

function admin_login(){
    if(isset($_POST['admin_login'])){
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM admin WHERE username = '$username'");
        //confirm($query);
        $rows = mysqli_num_rows($query);
        if ($rows > 0) {
            $row = fetch_array($query);
            $db_pass = $row['password'];
            if($db_pass == md5($password)) {
                $_SESSION['username'] = $username;
                redirect("index.php");
                set_message("Login Successfull");
               
            }
            else {
                header("Location: login.php");
                set_message("Sorry Username or password is invalid, Please try again");
                
            }
        }  
    }
}

// <!----------------------------------------- Admin Login END ------------------------------->




// <!----------------------------------------- Admin All Companies Start ------------------------------->

// <!----------------------------------------- Admin All Companies End ------------------------------->



// <!----------------------------------------- Admin Add Companies Start ------------------------------->

// <!----------------------------------------- Admin Add Companies End ------------------------------->






























































































































// <!----------------------------------------- Admin Add Clients START ------------------------------->
function add_clients(){
    if(isset($_POST['add_client'])){
        $name = escape_string($_POST['full_name']);
        $phone = escape_string($_POST['phone_number']);
        $address = escape_string($_POST['adderss']);
        $code = uniqid();
        $status = "view";
        $type = "dealer";
        $date = date("j-M-Y");
        
        
        
        $query = query("INSERT INTO clients(Name, Phone, Address, code, status, date) VALUES('$name', '$phone', '$address', '$code', '$status', '$date')");
        
        confirm($query);
        if($query){
            set_message("New Client Added");
        }
        else{
            set_message("Client can't added, Please try again");
        }
    }
}


// <!----------------------------------------- Admin Add Clients END ------------------------------->


// <!----------------------------------------- Admin Modal Add Clients Start ------------------------------->
function modal_add_clients(){
    if(isset($_POST['m_add_client'])){
        $name = escape_string($_POST['name']);
        $phone = escape_string($_POST['phone']);
        $address = escape_string($_POST['adderss']);
        $code = uniqid();
        $status = "view";
        $type = "dealer";
        $date = date("j-M-Y");
        
        
        $query = query("INSERT INTO clients(Name, Phone, Address, code, status, date) VALUES('$name', '$phone', '$address', '$code', '$status', '$date')");
        
        confirm($query);
        if($query){
            set_message("New Client Added");
        }
        else{
            set_message("Client can't added, Please try again");
        }
    }
}
// <!----------------------------------------- Admin Modal Add Clients END ------------------------------->


// <!----------------------------------------- Admin All Clients START ------------------------------->
function all_clients(){
    $query = query("SELECT * FROM clients WHERE status='view' ORDER BY id DESC");
    confirm($query);
    $rows = mysqli_num_rows($query);
    if($rows > 0){
        $i = 0;
        while($row = fetch_array($query)){
            $i += 1;
            $client = <<<DELIMITER
                                  
                     <tr>
                               <td>$i</td>
                               <td>
                                   <a href="index.php?report_for_dea_ind={$row['code']}">{$row['Name']}</a>
                               </td>
                               <td>{$row['Phone']}</td>
                                <td>{$row['Address']}</td>
                               <td>{$row['code']}</td>
                               <td>{$row['date']}</td>
                                <td>
                               <abbr title="Click to View Report" class="text-success">
                                 <a href="index.php?report_for_dea_ind={$row['code']}"><i class="fas fa-eye btn btn-sm btn-success"></i></a></abbr>
                                               <abbr title="Click to Edit" class="text-success">
                                 <a href=""><i class="far fa-edit btn btn-sm btn-primary"></i></a></abbr>
                                              <abbr title="Click to Delete" class="text-success">
                                 <a href=""><i class="fas fa-eye-slash btn btn-sm btn-danger"></i></a></abbr>
                              </td>
                    </tr>
            
            
DELIMITER;
            echo $client;
}
}
}
// <!----------------------------------------- Admin All Clients END ------------------------------->


// <!------------------------------------- Admin Add New Product START ------------------------------->
function add_product(){
    if(isset($_POST['add_product'])){
        $product_name = escape_string($_POST['product_name']);
        $price = escape_string($_POST['price']);
        $status = "view";
        
        $product_image = $_FILES['image']['name'];
        $product_image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($product_image_tmp, PRODUCT_IMAGES . DS . $product_image);
        
        $query = query("INSERT INTO products(product_name, price, image, status) VALUES('$product_name', '$price', '$product_image', '$status')");
        
        confirm($query);
        if($query){
            set_message("New Product Added");
        }
        else{
            set_message("Product can't added, Please try again");
        }
    }
}


// <!------------------------------------- Admin Add New Product END ------------------------------->



// <!------------------------------------- Admin All Products START ------------------------------->
function all_products(){
    $query = query("SELECT * FROM products WHERE status ='view' ORDER BY id DESC");
    confirm($query);
    $rows = mysqli_num_rows($query);
    if($rows > 0){
        $i = 0;
        while($row = fetch_array($query)){
            $i +=1;
            $product = <<<DELIMITER
            
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  {$i}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{$row['product_name']}</b></h2>
                      <p class="text-muted text-sm"><b>Price per unit: </b>{$row['price']}TK</p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Stock: {$row['unit']} Unit</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../resources/media/{$row['image']}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="index.php?productid={$row['id']}" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i> Edit
                    </a>
                    <a href="index.php?productid={$row['id']}" class="btn btn-sm btn-danger">
                      <i class="fas fa-user"></i> Hide
                    </a>
                  </div>
                </div>
              </div>
            </div>
                           
DELIMITER;
            echo $product;
        }
    }
}


// <!------------------------------------- Admin All Products END ------------------------------->


// <!------------------------------------- Admin Stockinfo START ------------------------------->
function stockinfo(){
    $query = query("SELECT * FROM products WHERE status ='view' ORDER BY id DESC");
    confirm($query);
    $rows = mysqli_num_rows($query);
    if($rows > 0){
        $i = 0;
        while($row = fetch_array($query)){
            $i +=1;
            $total_price = $row['price']*$row['unit'];
            $product = <<<DELIMITER
            
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  {$i}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{$row['product_name']}</b></h2>
                      <p class="text-muted text-sm"><b>Price per unit: </b>{$row['price']}TK</p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Stock: {$row['unit']} Unit</li>
                        <li class="small mt-4 text-primary"><span class="fa-li"><i class="fas fa-heart"></i></span> Total Price of all Stock: {$total_price}TK</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../resources/media/{$row['image']}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-center">
                    <a href="index.php?stockupdate={$row['id']}" class="btn btn-info bg-info">
                      <i class="fas fa-cubes"></i> Update Stock
                    </a>
                  </div>
                </div>
              </div>
            </div>
                           
DELIMITER;
            echo $product;
        }
    }
}


// <!------------------------------------- Admin Stockinfo END ------------------------------->

// <!------------------------------------- Admin add / Update Stock END ------------------------------->
function update_stock(){
    $stock_id = $_GET['stockupdate'];
    
    $stock_query = query("SELECT * FROM products WHERE id = '$stock_id'");
    //confirm($stock_query);
    $row = fetch_array($stock_query);
    
    $exist_unit = $row['unit'];
    
    if(isset($_POST['update_stock'])){
        
        $unit = escape_string($_POST['num_unit']) + $exist_unit;
        
        $query = query("UPDATE products SET unit = '$unit' WHERE id = '$stock_id'");
        
        confirm($query);
        if($query){
            set_message("Stock Updated");
            redirect("index.php?stockinfo");
        }
        else{
            set_message("Stock can't Updated, Please try again");
        }
    }
}

// <!------------------------------------- Admin add / Update Stock END ------------------------------->



// <!------------------------------------- Admin sell product page---->All product List Start ---------------------------->
function all_product_list_for_sell(){
    $query = query("SELECT * FROM products WHERE status='view' ORDER BY id DESC");
    confirm($query);

    $rows = mysqli_num_rows($query);
    if($rows > 0){
        $i = 0;
        while($row = fetch_array($query)){
        
            $product = <<<DELIMITER
                  <li class="list-group-item">
                  
                    <div class="user-block col-md-12">
                        
                            <img class="img-circle img-bordered-sm" src="../resources/media/{$row['image']}">
                            <span class="username">
                              <a href="#">{$row['product_name']}</a>
                            </span>
                            <span class="description">Price: {$row['price']}</span>
                            <span class="description text-primary">Available: {$row['unit']}</span>
                            <button class = "col-md-12 btn btn-primary" onclick="myFunction('{$row['id']}','{$row['product_name']}','{$row['price']}')">Add me</button> 
                            
                       
                    </div>
                 
                  </li>        
                     
            
            
DELIMITER;
            echo $product;
        }
    }
}

// <!------------------------------------- Admin sell product page---->All product List END ------------------------------->


















/*
// <!------------------------------------- Admin All Purifier Matchine model START ------------------------------->
function all_purifier_matchine_model(){
    $query = query("SELECT * FROM purifier_products ORDER BY id DESC");
    confirm($query);
    $rows = mysqli_num_rows($query);
    if($rows > 0){
        while($row = fetch_array($query)){
            $model = <<<DELIMITER
            <option value="{$row['product_name']}">{$row['product_name']}</option>
            
DELIMITER;
            echo $model;
        }
    }
}

// <!------------------------------------- Admin All Purifier Matchine model END ------------------------------->


// <!------------------------- Admin Report for Individual or Dealer Clients START ------------------------------->

function dealer_individual_report(){
    $code = $_GET['report_for_dea_ind'];
    $query = query("SELECT * FROM dealer_or_indi_clients_report WHERE code='$code'");
    confirm($query);
    $rows = mysqli_num_rows($query);
    if($rows > 0){
        $i = 0;
        $due = 0;
        while($row = fetch_array($query)){
            $i += 1;
            $due = $row['todays_due'];
                        
            $client = <<<DELIMITER
            
                        <tr>
                            <td>$i</td>
                            <td>{$row['date']}</td>
                            <td>{$row['product_name']}</td>
                            <td>{$row['amount_of_jar']}</td>
                            <td>TK.{$row['total_price']}</td>
                            <td>TK.{$row['paid']}</td>
                            <td>TK.{$row['todays_due']}</td>
                        </tr>
            
DELIMITER;
            echo $client;            
            }
    }
       
}

// <!------------------------- Admin Report for Individual or Dealer Clients END ------------------------------->





// <!----------------------- Admin Individual Clients or Dealer Check Product Clients Start --------------------->
function check_di_indivi(){
    if(isset($_POST['di_check'])){
        $code = escape_string($_POST['code']);
        
        $query = query("SELECT * FROM dealer_or_individual_clients WHERE code = '$code'");
        
        $rows = mysqli_num_rows($query);
        if ($rows > 0) {
        	$row = fetch_array($query);
        	$db_code = $row['code'];
            
            $_SESSION["a"] = $db_code;
        	if ($db_code == $code){
                
        		$client_info = <<<DELIMITER
                <div class="card-body">
                                <center class=""> 
                                    <h4 class="card-title">{$row['Name']}</h4>
                                    <div class="row">
                                        <div class="col-md-6 m-t-10"><h6 class="card-subtitle text-right">Address: {$row['Address']}</h6></div>
                                        <div class="col-md-6 m-t-10"><h6 class="card-subtitle text-left">Phone: {$row['Phone']}</h6></div>
                                    </div>
                                </center>
                            </div>
                            
DELIMITER;
                echo $client_info;
        	}
        	else{
        		set_message("Sorry, This Code is incorrect");
        	}
        }
    }
    
    if(isset($_POST['sell_di_indv_now'])){
        $product_name = escape_string($_POST['product_name']);
        $fetch_query = query("SELECT * FROM products WHERE product_name='$product_name'");
        confirm($fetch_query);
        $rows = mysqli_num_rows($fetch_query);
        if($rows > 0){
            $row = fetch_array($fetch_query);
            $price = $row['price'];
        }
        
        $db_code = $_SESSION["a"];
        //$client_code = $row['code'];
        $date = date("j-M-Y g:iA");
        $amount_of_jar = escape_string($_POST['amount_jar']);
        $paid = escape_string($_POST['paid']);
        $price = $price;
        $total_price = $amount_of_jar*$price;
        $todays_due = $total_price - $paid;
        
        
        $query = query("INSERT INTO dealer_or_indi_clients_report(product_name, code, date, amount_of_jar, total_price, paid, todays_due) VALUES('$product_name', '$db_code', '$date', '$amount_of_jar', '$price', '$paid', '$todays_due')");
        
        confirm($query);
        if($query){
            set_message("Sell Done");
        }
        else{
            set_message("Product can't Sold, Please try again");
        }
    }
    
}

// <!----------------------- Admin Individual Clients or Dealer Check Product Clients END --------------------->



*/









































 ?>