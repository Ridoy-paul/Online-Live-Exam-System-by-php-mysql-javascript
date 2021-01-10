<?php
if(isset($_SESSION['username'])){
     $username =  $_SESSION['username'];
    $f_query=query("SELECT * FROM `admin` where username='$username' || gmail = '$username'");
    confirm($f_query);
    $f_rows=fetch_array($f_query);
    $type = $f_rows['type'];
    
    if ($type == 'Admin'){
        ?><!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
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
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <?php
                                $std_qry=query("SELECT *,count(name) as total_std FROM `students` ");
                                $total_std_name=fetch_array($std_qry);
                                ?>
                                <h3><?php echo $total_std_name['total_std'];?></h3>

                                <p>Total Student</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <?php
                                $pending_std=query("SELECT *,count(name) as pending_std FROM `students` WHERE status='Pending' ");
                                $pending_std_name=fetch_array($pending_std);
                                ?>
                                <h3><?php echo $pending_std_name['pending_std'];?></h3>

                                <p>Total Pending Student</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/all-pending-students.php" class="small-box-footer">See Student <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <?php
                                $accepted_std=query("SELECT *,count(name) as accepted_std FROM `students` WHERE status='Accepted' ");
                                $accepted_std_name=fetch_array($accepted_std);
                                ?>
                                <h3><?php echo $accepted_std_name['accepted_std'];?></h3>

                                <p>Total Accepted Student</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="all-approved-students.php" class="small-box-footer">See Student <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <?php
                                $course_qry=query("SELECT *,count(name) as total_course FROM `course` ");
                                $row_course_qry=fetch_array($course_qry);
                                ?>
                                <h3><?php echo $row_course_qry['total_course']?></h3>

                                <p>All Course</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="/all-course.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">

                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">


                        <!-- /.card -->


                        <!-- /.card -->
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper --><?php
    }
   
}
?>
<!-- Main Sidebar Container -->
