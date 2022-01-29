<!--Name:Aiman Basheer Mohammed-->
<!--Section:01A-->
<!--Matric Number:CA19124-->
<!---Group 1A-2------>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FYP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <?php
  include $_SERVER["DOCUMENT_ROOT"] . '/StudFYP_Project/html/controller/AnnouncementHandler.php';
  include $_SERVER["DOCUMENT_ROOT"] . '/StudFYP_Project/html/controller/FypActivityHandler.php';

  session_start();
  ?>


      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Dashboard</title>

      <!-- Bootstrap 5 CSS -->
      <link rel="stylesheet" href="../../../bootstrap_v5.1/css/styles.css" />

      <!-- Bootstrap 5 JavaScript -->
      <script src="../../../bootstrap_v5.1/js/scripts.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

      <!-- Fontawesome CSS -->
      <script src="https://use.fontawesome.com/8134766fa6.js"></script>

      <!-- Full Calendar API -->
      <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' /> -->
      <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>

      <!-- Moment Js API -->
      <script src='https://momentjs.com/downloads/moment.js'></script>

      <!-- CSS -->
      <link rel="stylesheet" href="../../../css/main.css" />

      <!-- JS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>



</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img class="logo ms-3" src="../../../images/ump_logo.png" alt="UMP" />
        <a class="navbar-brand ms-3" href="index.html">StudFYP</a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fa fa-bars"></i>
        </button>
        <!-- Navbar Notification-->

        <!-- Navbar-->
        <ul class="navbar-nav d-md- ms-auto me-1">
            <!-- Announcement -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell fa-fw"></i> Notification</a>
                <ul class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="navbarDropdown">
                    <li class="dropdown-header text-white text-center p-2">
                        Notfication
                    </li>
                    <?php
                    printNotificationList();
                    ?>
                    <li>
                        <a class="dropdown-item see-more-notification" href="../../lecturer_main.php">See more ...</a>
                    </li>
                </ul>
            </li>

            <!-- Profile -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user fa-fw"></i> Account</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="#!">My profile</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../../controller/logout_handler.php">Logout</a></li>
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
                        <!-- Dashboard -->
                        <a class="nav-link" href="lecturer_main.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-tachometer" aria-hidden="true"></i>
                            </div>
                            Dashboard
                        </a>

                        <!-- My Profile -->
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            My profile
                        </a>

                        <!-- FYP Coordinator -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCoordinator" aria-expanded="false" aria-controls="collapseCoordinator">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            FYP coordinator
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseCoordinator" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>
                                    Assign student to supervisor
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Assign student to evaluator
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Announcement platform
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>FYP progress
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Student mark
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Manage FYP submission date
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Manage FYP rubrics
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Coordinator final report
                                </a>
                            </nav>
                        </div>

                        <!-- FYP Supervisor -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSupervisor" aria-expanded="false" aria-controls="collapseSupervisor">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            FYP supervisor
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseSupervisor" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>View assigned student
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>View student's FYP
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Supervisor report
                                </a>
                            </nav>
                        </div>

                        <!-- FYP Evaluation -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEvaluation" aria-expanded="false" aria-controls="collapseEvaluation">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            FYP Evaluation
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseEvaluation" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="module5\lecturer\view_assigned_fyp.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>View assigned FYP
                                </a>
                                <a class="nav-link" href="module5\lecturer\evaluation_report.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Evaluation report
                                </a>
                            </nav>
                        </div>

                        <!-- My report -->
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                            </div>
                            My report
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php
                    echo $_SESSION['username'];
                    ?>
                </div>
            </nav>
        </div>



  <!---main------->
  <div class="container">

      <div class="row justify-content-center">
          <div class="col-md-10">

              <div class="card mt-5">
                  <div class="card-header text-center">
                      <h4>Assign Supervisor to Student </h4>
                  </div>
                  <div class="card-body">

<form method="post" action="SpuerConnect.php">

<lebel  class="form-lebel">Select Student Id :</lebel>

  <?php


  $mysqli = NEW MySQLi('localhost','root','','studfyp_db');

  $resultSet = $mysqli->query("SELECT stud_id FROM student");
  ?>

  <select class="form-control" name="stud_id">
    <?php
    while($rows = $resultSet->fetch_assoc())
    {

        $stud_id = $rows['stud_id'];
        echo "<option value='$stud_id'>$stud_id</option>";


    }
    ?>
  </select>

  <lebel for="stud_id"  class="form-lebel">Select Supervisor Id : </lebel>



    <?php


    /*$mysqli = NEW MySQLi('localhost','root','','studfyp_db');*/

    include_once '../../../mySQLi/config.php';

    $resultSet = $mysqli->query("SELECT lect_id FROM lecturer");
    ?>

    <select class="form-control" name="lect_id">
      <?php
      while($rows = $resultSet->fetch_assoc())
      {

          $lect_id = $rows['lect_id'];
          echo "<option value='$lect_id'>$lect_id</option>";


      }
      ?>
    </select><br>

      <input class="btn btn-primary" type="submit" name="save_select" >





</form>


</body>
</html>
