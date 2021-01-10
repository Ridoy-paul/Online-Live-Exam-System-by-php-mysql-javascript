<?php require_once("backend/config.php"); ?>
<?php
    // student session start 
    $username =  $_SESSION['username'];
    $select_student=query("SELECT * FROM `students` where email='$username' ");
    $fetch_student=fetch_array($select_student);
    $std_row=$fetch_student['id'];
    // student session end



?>
<!doctype html>
<html lang="en">
    
<!-- Mirrored from preview.colorlib.com/theme/etrain/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 08:16:20 GMT -->
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>MarchForwardBD</title>
<link rel="icon" href="media/fav.png">

<link rel="stylesheet" href="quize/css/bootstrap.min.css">

<link rel="stylesheet" href="quize/css/animate.css">

<link rel="stylesheet" href="quize/css/owl.carousel.min.css">

<link rel="stylesheet" href="quize/css/themify-icons.css">

<link rel="stylesheet" href="quize/css/flaticon.css">

<link rel="stylesheet" href="quize/css/magnific-popup.css">

<link rel="stylesheet" href="quize/css/slick.css">

<link rel="stylesheet" href="quize/css/style.css">
</head>
<style>
    .single_feature_part {
    border: 1px solid #FF663B !important;
    margin-top: 10px !important;
}
#ridoyPaul{
    margin-top: 70px !important;
}
</style>
<body>

<header class="main_menu home_menu">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-12">
<nav class="navbar navbar-expand-lg navbar-light">
<a class="navbar-brand" href="home.php"> <img src="quize/img/er-1.png" alt="logo" style="width: 188px;"> </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse main-menu-item justify-content-end" id="navbarSupportedContent">
<ul class="navbar-nav align-items-center">
<li class="nav-item active">
<a class="nav-link" href="home.php">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="all-exam-for-student.php">Live Exam</a>
</li>
<li class="nav-item">
<a class="nav-link" href="students-permanent-exam.php">Test Your Skills</a>
</li>
<li class="nav-item">
<a class="nav-link" href="batch.php">Batch</a>
</li>

<li class="d-lg-block nav-item dropdown">
<a class="btn_1 dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">Profile</a>
<div class="card dropdown-menu" aria-labelledby="navbarDropdown" style="width: 15rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a class="nav-link" href="student-profile.php"><?php echo $fetch_student['name'];?></a></li>
    <!--<li class="list-group-item"><a class="nav-link" href="student-profile.php">Profile</a></li>-->
    <li class="list-group-item"><a class="nav-link" href="logout.php">Logout</a></li>
  </ul>
</div>
</li>

</ul>
</div>
</nav>
</div>
</div>
</div>
</header>
