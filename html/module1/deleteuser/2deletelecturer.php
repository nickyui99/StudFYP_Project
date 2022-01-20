<?php
include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php';
session_start(); 
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add User Details</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="../../../bootstrap_v5.1/css/styles.css" />

    <!-- Bootstrap 5 JavaScript -->
    <script src="../bootstrap_v5.1/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

    <!-- Fontawesome CSS -->
    <script src="https://use.fontawesome.com/8134766fa6.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../../../css/main.css" />

    <!-- JS -->
    <script src="../../../js/module_1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img class="logo ms-3" src="../../../images/ump_logo.png" alt="UMP" />
        <a class="navbar-brand ms-3 me-0" href="index.html">StudFYP</a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fa fa-bars"></i>
        </button>
        <!-- Navbar Notification-->

        <!-- Navbar-->
        <ul class="navbar-nav d-md- ms-auto me-1">
            <!-- Announcement -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-bell fa-fw"></i> Notification</a>
                <ul class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="navbarDropdown">
                    <li class="dropdown-header text-white text-center p-2">
                        Notfication
                    </li>
                    <li>
                        <a class="dropdown-item" href="#!">FYP Announcement 1</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="#!">FYP Announcement 2</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="#!">FYP Announcement 2</a>
                    </li>
                    <li>
                        <a class="dropdown-item see-more-notification" href="#">See more ...</a>
                    </li>
                </ul>
            </li>

            <!-- Profile -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-user fa-fw"></i> Account</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="#!">My profile</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="login_controller/logout_handler.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav mt-3">

                        <!-- Add user -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseAddUser" aria-expanded="false"
                            aria-controls="collapseAddUser">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            Add user
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseAddUser" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav nav-pills nav-fill">
                                <a class="nav-link " href="http://localhost/StudFYP_Project/html/module_1/adduser/1addstudent.php" >
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                   
                                    </div>
                                    Student
                                </a>
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/adduser/2addlecturer.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Lecturer
                                </a>
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/adduser/3addcoordinator.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Coordinator
                                </a>
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/adduser/4addindustrialpanel.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Industrial panel
                                </a>
                            </nav>
                        </div>

                        <!-- Delete user -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseDeleteUser" aria-expanded="false"
                            aria-controls="collapseDeleteUser">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            
                            Delete user
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse show" id="collapseDeleteUser" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav nav-pills nav-fill">
                                <a class="nav-link " href="http://localhost/StudFYP_Project/html/module_1/deleteuser/1deletestudent.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin " aria-hidden="true"></i>
                                    </div>
                                    Student
                                </a>
                                <a class="nav-link text-light active" href="http://localhost/StudFYP_Project/html/module_1/deleteuser/2deletelecturer.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin text-light" aria-hidden="true"></i>
                                    </div>Lecturer
                                </a>
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/deleteuser/3deletecoordinator.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Coordinator
                                </a>
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/deleteuser/4deleteindustrialpanel.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Industrial panel
                                </a>
                            </nav>
                        </div>

                        <!-- Edit user -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseEditUser" aria-expanded="false"
                            aria-controls="collapseEditUser">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            Edit user
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseEditUser" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/updateuser/1updatestudent.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>
                                    Student
                                </a>
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/updateuser/2updatelecturer.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Lecturer
                                </a>
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/updateuser/3updatecoordinator.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Coordinator
                                </a>
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/updateuser/4updateindustrialpanel.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Industrial panel
                                </a>
                            </nav>
                        </div>

                        <!-- View user -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseViewUser" aria-expanded="false"
                            aria-controls="collapseViewUser">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            View user
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseViewUser" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/viewuser/1viewstudent.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>
                                    Student
                                </a>
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/viewuser/2viewlecturer.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Lecturer
                                </a>
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/viewuser/3viewcoordinator.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Coordinator
                                </a>
                                <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/viewuser/4viewindustrialpanel.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Industrial panel
                                </a>
                            </nav>
                        </div>

                        <!-- Total user -->
                        <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/total&report/totaluser.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                            </div>
                            Total user
                        </a>

                        <!-- My report -->
                        <a class="nav-link" href="http://localhost/StudFYP_Project/html/module_1/total&report/report.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                            </div>
                            Report
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:  </div>
                    <?php 
                        echo $_SESSION['username'];
                    ?>
                </div>
            </nav>
        </div>
          <!-- Main Content -->
          <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                                   
                         <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary btn-sm pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal"  >Delete All Data</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete All Lecturer's Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete all data ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="" method="post"> 
        <input type="submit" class="btn btn-primary" name="Confirm" value="Confirm">
        </form>
      </div>
    </div>
  </div>
</div>
<?php

  if(isset($_POST['Confirm']))
  {		
	$deleteall = "DELETE FROM lecturer ";	if ($db->query($deleteall) === TRUE) {
		echo '<script type="text/javascript">';
		echo ' alert(" All record deleted successfully!")'; 
		echo '</script>';		
 } else {
   echo "Error deleting record: " . $db->error;
 }
 $db->close();
} 
?>
                    <h1 class="mt-4">Delete User</h1>
     
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Lecturer</li>
                        <li class="breadcrumb-item active">Delete Lecturer's Data </li>
                    </ol>
                  
   <form action="" method="post"> 
   <div class="form-group">
	   
                            <table class="table table-borderless">
                            <tbody>
                                    <tr class="">
<th>Enter Lecturer's ID: </th>
<td><input type="text" name="getlectid" class="form-control"></td>
<th><input type="submit" class="btn btn-secondary btn-sm" name="Search" value="Search"></th>
</tr> </form>
<?php 

if(isset($_POST['Search']))
{    if(empty($_POST['getlectid']))
  {
     echo '<script type="text/javascript">';
     echo ' alert("Required on Student ID ! ")'; 
     echo '</script>';
  }else{

  $getlectid = $_POST['getlectid']; 
  $view = "SELECT * FROM lecturer  where lect_id = '$getlectid' ";
$result = $db->query($view);
echo"<table class= table table-hover table-bordered >";	
if ($result->num_rows > 0) {
  $_SESSION['getlectid'] = $getlectid;	
  echo "<script>window.open('http://localhost/StudFYP_Project/html/module_1/deleteuser/2deletelecturer2.php','_self')</script>";}
  else {
  echo "0 results";
  }}}
  
?> 
</table>



</tbody>

 
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="text-muted text-center">
                        Copyright &copy; University Malaysia Pahang 2021
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
