<?php
if(isset($_SESSION['username'])){
     $username =  $_SESSION['username'];
     
    $f_query=query("SELECT * FROM `admin` where username='$username' || gmail = '$username'");
    confirm($f_query);
    $f_rows=fetch_array($f_query);
    $type = $f_rows['type'];
    
    if ($type == 'Admin'){
        ?><aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link bg-light">
            <img src="media/er-1.png"  class="brand-image">
            <span class="brand-text font-weight-light"></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="index.php" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                    <a href="admin-profile.php" class="nav-link">
                      <i class="nav-icon fas fa-id-card-alt"></i>
                      <p>
                        Admin Profile
                        <i class="right"></i>
                      </p>
                    </a>
          </li>
          <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fab fa-discourse"></i>
                              <p>
                                Batch
                                <i class="right fas fa-angle-left"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item bg-info">
                                    <a href="add-course.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus-square"></i>
                                        <p>
                                            Add New Batch
                                            <span class="right badge badge-danger"></span>
                                        </p>
                                    </a>
                                </li>
                              <li class="nav-item bg-info">
                                    <a href="all-course.php" class="nav-link">
                                        <i class="nav-icon far fa-share-square"></i>
                                        <p>
                                            All Batch
                                            <span class="right badge badge-danger"></span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item bg-info">
                                    <a href="all-hide-course.php" class="nav-link">
                                        <i class="nav-icon fas fa-eye-slash"></i>
                                        
                                        <p>
                                            Hide Batch
                                            <span class="right badge badge-danger"></span>
                                        </p>
                                    </a>
                                </li>
                            </ul>
                    </li>
                    <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-diagnoses"></i>
                              <p>
                                Exam
                                <i class="right fas fa-angle-left"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item bg-info">
                                    <a href="add-exam.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus-square"></i>
                                        <p>
                                            Add Exam
                                            <span class="right badge badge-danger"></span>
                                        </p>
                                    </a>
                                </li>
                              <li class="nav-item bg-info">
                                    <a href="all-exam.php" class="nav-link">
                                        <i class="nav-icon fas fa-clipboard-list"></i>
                                        <p>
                                            All Temporary Exam
                                            <span class="right badge badge-danger"></span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item bg-info">
                                    <a href="al-permanent-exam.php" class="nav-link">
                                        <i class="nav-icon fas fa-clipboard-list"></i>
                                        <p>
                                            All Permanent Exam
                                            <span class="right badge badge-danger"></span>
                                        </p>
                                    </a>
                                </li>
                                
                                <li class="nav-item bg-info">
                                    <a href="all-hide-exam.php" class="nav-link">
                                        <i class="nav-icon fas fa-eye-slash"></i>
                                        <p>
                                            All Hide Exam
                                            <span class="right badge badge-danger"></span>
                                        </p>
                                    </a>
                                </li>
                            </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="add-question.php" class="nav-link bg-danger">
                            <i class="nav-icon fas fa-plus-square"></i>
                            <p>
                                Add Questions
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-users"></i>
                              <p>
                                Students
                                <i class="right fas fa-angle-left"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item bg-info">
                                    <a href="all-pending-students.php" class="nav-link">
                                        <i class="nav-icon fas fa-user-plus"></i>
                                        <p>
                                            All Pending Students
                                            <span class="right badge badge-danger"></span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item bg-info">
                                    <a href="all-approved-students.php" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            All Approved Students
                                            <span class="right badge badge-danger"></span>
                                        </p>
                                    </a>
                                </li>
                              
                            </ul>
                    </li>
                    <!--upload csv-->
                    <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-users"></i>
                              <p>
                                Upload CSV
                                <i class="right fas fa-angle-left"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item bg-info">
                                    <a href="/csv-upload-for-students.php" class="nav-link">
                                        <i class="nav-icon fas fa-user-plus"></i>
                                        <p>
                                            Student CSV Upload
                                            <span class="right badge badge-danger"></span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item bg-info">
                                    <a href="/csv-upload-for-exam.php" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Question CSV Upload
                                            <span class="right badge badge-danger"></span>
                                        </p>
                                    </a>
                                </li>
                                
                              
                            </ul>
                    </li>
                    
                    <li class="nav-item has-treeview">
                        <a href="/student-report.php" class="nav-link bg-danger">
                            <i class="nav-icon fas fa-plus-square"></i>
                            <p>
                                Student Report
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside><?php
    }
    else{
        ?>
        
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link bg-light">
            <img src="media/er-1.png"  class="brand-image">
            <span class="brand-text font-weight-light"></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="index.php" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                                <a href="/student-profile.php" class="nav-link">
                                <i class="nav-icon fas fa-id-card-alt"></i>
                                <p>
                                    Profile
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                      </li>
                      </li>
                      <li class="nav-item has-treeview">
                                <a href="all-exam-for-student.php" class="nav-link">
                                <i class="nav-icon fas fa-diagnoses"></i>
                                <p>
                                    Exam
                                    <span class="right badge badge-danger">Click</span>
                                </p>
                            </a>
                      </li>
                     <li class="nav-item has-treeview bg-danger">
                                <a href="students-permanent-exam.php" class="nav-link">
                                <i class="nav-icon fas fa-book-open"></i>
                                <p>
                                    Test Your Skills
                                    <span class="right badge badge-success"></span>
                                </p>
                            </a>
                      </li>
                     
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
        
        <?php
    }
    
}
?>
<!-- Main Sidebar Container -->
    
