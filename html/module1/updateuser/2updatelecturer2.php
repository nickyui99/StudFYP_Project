<?php
include_once '../../../mySQLi/config.php';
session_start(); 
?>
  
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update User Details</title>

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
                                <a class="nav-link" href="../adduser/1addstudent.php" >
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
                        <div class="collapse" id="collapseDeleteUser" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../deleteuser/1deletestudent.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>
                                    Student
                                </a>
                                <a class="nav-link" href="../deleteuser/2deletelecturer.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Lecturer
                                </a>
                                <a class="nav-link" href="../deleteuser/3deletecoordinator.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Coordinator
                                </a>
                                <a class="nav-link" href="../deleteuser/4deleteindustrialpanel.php">
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
                        <div class="collapse  show" id="collapseEditUser" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav nav-pills nav-fill">
                                <a class="nav-link" href="1updatestudent.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>
                                    Student
                                </a>
                                <a class="nav-link text-light active" href="2updatelecturer.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin text-light" aria-hidden="true"></i>
                                    </div>Lecturer
                                </a>
                                <a class="nav-link" href="3updatecoordinator.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Coordinator
                                </a>
                                <a class="nav-link" href="4updateindustrialpanel.php">
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
                            <nav class="sb-sidenav-menu-nested nav nav-pills nav-fill">
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
                    <h1 class="mt-4">Update User</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Lecturer</li>
                        <li class="breadcrumb-item active">Update Lecturer Data</li>
                    </ol>
<?php
  
    $view = "SELECT * FROM lecturer where lect_id = '$_SESSION[getlectid]' ";
    $result = $db->query($view);
    if ($result->num_rows > 0) {	
     
  // output data of each row
  while($row = $result->fetch_assoc()) {?> 


<form class="needs-validation" action="" method="post" novalidate> 
   <div class="form-group mb-3">
    <label for="lectid">Lecturer ID</label>
    <input type="text" class="form-control" name="lectid"  required disabled="disabled" value="<?php echo $row['lect_id'] ?>"/>
    <div class="invalid-feedback">Please enter lecturer's ID.</div>
  </div>
  <div class="form-group mb-3">
    <label for="lectname">Name</label>
    <input type="text" name="lectname" class="form-control" required value="<?php echo $row['lect_name'] ?>" />
    <div class="invalid-feedback">Please provide lecturer's name.</div>
  </div>
  <div class="form-group mb-3">
    <label for="lectpassword">Password</label>
    <input type="text" name="lectpassword" class="form-control" value="<?php echo $row['lect_password'] ?>" />
    <div class="invalid-feedback">Please provide a password.</div>
  </div>
    <div class="form-group  mb-3">
    <label for="lectposition">Position</label>
    <select name="lectposition" id="lectposition" class="form-select form-select-sm mb-3"  >
<option value = "Professor" <?php if ($row['lect_position'] == 'Professor') { echo 'selected="selected"';}?>>Professor</option>
<option value = "Associate Professor"<?php if ($row['lect_position'] == ' Assoiciate Professor') { echo 'selected="selected"';}?> >Associate Professor</option>
<option value ="Senior Lecturer" <?php if ($row['lect_position'] == 'Senior Lecturer') { echo 'selected="selected"';}?>>Senior Lecturer</option>
<option value = "Lecturer" <?php if ($row['lect_position'] == 'Lecturer') { echo 'selected="selected"';}?>>Lecturer</option></select>
  </div>
  <div class="form-group mb-3">
    <label for="lectaddress">Address</label>
    <input type="text" name="lectaddress" class="form-control" required  value="<?php echo $row['lect_address'] ?>" />
    <div class="invalid-feedback"> Please provide lecturer's address.</div>
  </div>
  <div class="form-group mb-3">
    <label for="lectemail">Email</label>
    <input type="email" name="lectemail" class="form-control" required value="<?php echo $row['lect_email'] ?>" />
    <div class="invalid-feedback"> Please provide a valid email.</div>
  </div>
  <div class="form-group mb-3">
    <label for="lecthpnum">Phone Number</label>
    <input type="text" name="lecthpnum" class="form-control" required value="<?php echo $row['lect_contact_num'] ?>" />
    <div class="invalid-feedback">Please provide phone number.</div>
  </div>
  <div class="form-group  mb-3">
    <label for="lectfaculty">Faculty</label>
    <select name="lectfaculty" id="lectfaculty" class="form-select form-select-sm mb-3" >
<option value="FK" <?php if ($row['lect_faculty'] == 'FK') { echo 'selected="selected"';}?>>FK</option>
<option value="FTEK" <?php if ($row['lect_faculty'] == 'FTEK') { echo 'selected="selected"';}?>>FTEK</option>
<option value="FTKKP" <?php if ($row['lect_faculty'] == 'FTKKP') { echo 'selected="selected"';}?>>FTKKP</option>
<option value="FIM" <?php if ($row['lect_faculty'] == 'FIM') { echo 'selected="selected"';}?>>FIM</option>
<option value="FTKA" <?php if ($row['lect_faculty'] == 'FTKA') { echo 'selected="selected"';}?>>FTKA</option>
<option value="FTKEE" <?php if ($row['lect_faculty'] == 'FTKEE') { echo 'selected="selected"';}?>>FTKEE</option>
</select>
  </div>
  <div class="form-group mb-3">
    <label for="lectexp">Expertise</label>
    <input type="text" name="lectexp" class="form-control" required value="<?php echo $row['lect_expertise'] ?>" />
    <div class="invalid-feedback">Please elaborate expertise of the lecturer.</div>
  </div>
  <div class="form-group mb-3">
  <div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-secondary btn-bg mb-2" name="Update" value="Update">Update</button>
  </div></div>
</form>                         

   
<?php
  } }
  else {
    echo '<script type="text/javascript">';
    echo ' alert("Record not found !")'; 
    echo '</script>';	
  }
if(isset($_POST['Update']))
{  

  $lectname = $_POST['lectname'];
  $lectpassword = $_POST['lectpassword'];
   $lecthpnum = $_POST['lecthpnum'];
  $lectemail = $_POST['lectemail'];
  $lectaddress = $_POST['lectaddress'];
  $lectposition = $_POST['lectposition'];
  $lectexp = $_POST['lectexp'];
  $lectfaculty=$_POST['lectfaculty']; 
  $update = "UPDATE lecturer SET lect_name='$lectname' , lect_password=' $lectpassword' ,lect_contact_num= '$lecthpnum',lect_email= '$lectemail',lect_address= '$lectaddress',
     lect_position= '$lectposition',lect_expertise='$lectexp' ,lect_faculty= '$lectfaculty'  WHERE  lect_id  = '".$_SESSION['getlectid']."'";
     if (mysqli_query($db, $update)) {
      echo '<script type="text/javascript">';
      echo ' alert("Record has been updated successfully !")'; 
      echo '</script>';
      echo "<script>window.open('2updatelecturer.php','_self')</script>";

     } else {
        echo "Error: " . $update . ":-" . mysqli_error($db);
     }
     mysqli_close($db);
}
?> 
 </div>
   </div>
                </div>
</body>

 
                        <div class="card-body">
        
                        </div>
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

