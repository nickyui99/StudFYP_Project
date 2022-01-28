<?php
include_once '../../../mySQLi/config.php';
session_start(); 
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delete User Details</title>

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
        <a class="navbar-brand ms-3 me-0" href="/html/admin_main.php">StudFYP</a>

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
                    <li><a class="dropdown-item" href="/html/controller/logout_handler.php">Logout</a></li>
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
                                <a class="nav-link " href="../adduser/1addstudent.php" >
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                   
                                    </div>
                                    Student
                                </a>
                                <a class="nav-link" href="../adduser/2addlecturer.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Lecturer
                                </a>
                                <a class="nav-link" href="../adduser/3addcoordinator.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Coordinator
                                </a>
                                <a class="nav-link" href="../adduser/4addindustrialpanel.php">
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
                                <a class="nav-link " href="1deletestudent.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin " aria-hidden="true"></i>
                                    </div>
                                    Student
                                </a>
                                <a class="nav-link text-light active" href="2deletelecturer.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin text-light" aria-hidden="true"></i>
                                    </div>Lecturer
                                </a>
                                <a class="nav-link" href="3deletecoordinator.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Coordinator
                                </a>
                                <a class="nav-link" href="4deleteindustrialpanel.php">
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
                                <a class="nav-link" href="../updateuser/1updatestudent.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>
                                    Student
                                </a>
                                <a class="nav-link" href="../updateuser/2updatelecturer.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Lecturer
                                </a>
                                <a class="nav-link" href="../updateuser/3updatecoordinator.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Coordinator
                                </a>
                                <a class="nav-link" href="../updateuser/4updateindustrialpanel.php">
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
                                <a class="nav-link" href="../viewuser/1viewstudent.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>
                                    Student
                                </a>
                                <a class="nav-link" href="../viewuser/2viewlecturer.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Lecturer
                                </a>
                                <a class="nav-link" href="../viewuser/3viewcoordinator.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Coordinator
                                </a>
                                <a class="nav-link" href="../viewuser/4viewindustrialpanel.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Industrial panel
                                </a>
                            </nav>
                        </div>

                        <!-- Total user -->
                        <a class="nav-link" href="../total&report/totaluser.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                            </div>
                            Total user
                        </a>

                        <!-- My report -->
                        <a class="nav-link" href="../total&report/report.php">
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
                                   
                    
                    <h1 class="mt-4">Delete User</h1>
     
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Lecturer</li>
                        <li class="breadcrumb-item active">Delete Lecturer's Data </li>
                    </ol>
                  
                    <div class="input-group mb-3">
                    <span class="input-group-text">Lecturer's ID</span>
            
  <input type="text" class="form-control" disabled="disabled" value="<?php echo $_SESSION['getlectid'] ?>"/>
  <div class="input-group-append">
    <button class="btn btn-secondary btn-bg" disabled="disabled" type="submit" name="Search" value="Search">Search</button>

  </div>
</div>
                </div>
</form>
<?php 

  $view = "SELECT * FROM lecturer  where lect_id = '".$_SESSION['getlectid']."'";
$result = $db->query($view);
echo"<table class= table table-hover table-bordered >";  
if ($result->num_rows > 0) {
	
    echo" <thead class = thead-dark>"; 
	echo"<th class='text-center'>Lect ID</th>";
	echo"<th class='text-center'>Name</th>";
	echo"<th class='text-center'>Password</th>";
 	echo"<th class='text-center'>Phone Number</th>"; 
	echo"<th class='text-center'>Email</th>";
	echo"<th class='text-center'>Address</th>";
	echo"<th class='text-center'>Position</th>";
  echo"<th class='text-center'>Expertise</th>";
  echo"<th class='text-center'>Faculty</th>";
	echo"</tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo"<tr>";
	echo "<td class='text-center'>".$row["lect_id"]."</td>";
	echo "<td class='text-center'>".$row["lect_name"]."</td>";
	echo "<td class='text-center'>".$row["lect_password"]."</td>";
	echo "<td class='text-center'>".$row["lect_contact_num"]."</td>";
	echo "<td class='text-center'>".$row["lect_email"]."</td>";
	echo "<td class='text-center'>".$row["lect_address"]."</td>";  
  echo "<td class='text-center'>".$row["lect_position"]."</td>";
	echo "<td class='text-center'>".$row["lect_expertise"]."</td>";  
  echo "<td class='text-center'>".$row["lect_faculty"]."</td>";  
	echo"</tr>";	
  echo"</table>"?>
  <form action=" " method= "post" >
  <div class='d-flex justify-content-center'><input class='btn btn-secondary btn-sm'  type='submit' name='Delete' value='Delete'></div></form>
<?php
} }
else {
    echo '<script type="text/javascript">';
    echo ' alert("Record not found !")'; 
    echo '</script>';	
  }

 if(isset($_POST['Delete']))
 {		
   $sql = "DELETE  FROM lecturer where lect_id = '".$_SESSION['getlectid']."'";
       if ($db->query($sql) === TRUE) {
       echo '<script type="text/javascript">';
       echo ' alert("Record deleted successfully!")'; 
       echo '</script>';		
       echo "<script>window.open('2deletelecturer.php','_self')</script>";
} else {
  echo "Unable to delete as user is coordinator. Please unassign his/her position for coordinator before delete lecturer's position " ;
}
$db->close();
} 
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