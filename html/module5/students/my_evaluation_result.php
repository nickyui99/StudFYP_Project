<!DOCTYPE html>
<html lang="en">

<!-- /**
 * Name: Nicholas Ooi Zhee Chen
 * Matric Id: CB19080
 */-->

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/Controller/StudentHandler.php';
include $_SERVER["DOCUMENT_ROOT"] . '/html/controller/AnnouncementHandler.php';
session_start();

$projectDetails = getProjectDetails($_SESSION['stud_id']);
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Evaluation Result</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="../../../bootstrap_v5.1/css/styles.css" />

    <!-- Bootstrap 5 JavaScript -->
    <script src="../../../bootstrap_v5.1/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Fontawesome CSS -->
    <script src="https://use.fontawesome.com/8134766fa6.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../../../css/main.css" />
    <link rel="stylesheet" href="../../../css/module_5.css" />

    <!-- JS -->
    <script src="../../../js/module_5.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell fa-fw"></i> Notification</a>
                <ul class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="navbarDropdown">
                    <li class="dropdown-header text-white text-center p-2">
                        Notfication
                    </li>
                    <?php
                    printNotificationList();
                    ?>
                    <li>
                        <a class="dropdown-item see-more-notification" href="../../student_main.php"> See more ...</a>
                    </li>
                </ul>
            </li>

            <!-- Profile -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user fa-fw"></i> Account</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../../controller/logout_handler.php"> <i class="fa fa-sign-out"></i> Logout</a></li>
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
                        <!-- Dashboard -->
                        <a class="nav-link" href="student_main.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-tachometer" aria-hidden="true"></i>
                            </div>
                            Dashboard
                        </a>

                        <!-- My Profile -->
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            My profile
                        </a>

                        <!-- FYP Enrollment -->
                        <a class="nav-link" href="/html/module3/enrollement/1FYP_enrollement.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                            </div>
                            FYP Enrollment
                        </a>

                        <!-- My FYP -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFYP" aria-expanded="false" aria-controls="collapseFYP">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            My FYP
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseFYP" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="module3\MyFYP\4viewlogbook.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>
                                    View logbook
                                </a>
                                <a class="nav-link" href="module3\MyFYP\2updatelogbook.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Update logbook
                                </a>
                                <a class="nav-link" href="module3\MyFYP\5addlogbook.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Add logbook
                                </a>
                                <a class="nav-link" href="module3\MyFYP\1deletelogbook.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>Delete logbook
                                </a>
                            </nav>
                        </div>

                        <!-- My FYP Supervisor -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSupervisor" aria-expanded="false" aria-controls="collapseSupervisor">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            My FYP supervisor
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseSupervisor" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>View my evaluator
                                </a>
                            </nav>
                        </div>

                        <!-- FYP Evaluation -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEvaluation" aria-expanded="false" aria-controls="collapseEvaluation">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            My FYP evaluation
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseEvaluation" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/html/module5/students/view_my_evaluator.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>View my evaluator
                                </a>
                                <a class="nav-link" href="/html/module5/students/my_evaluation_result.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>My evaluation result
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php
                    echo $_SESSION['username']
                    ?>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <div class="card shadow my-3">
                        <div class="card body p-3">
                            <!-- Page Header -->
                            <h1 class="ms-0 mt-4">Evaluation Result</h1>

                            <!-- Breadcrumb -->
                            <ol class="breadcrumb mb-3">
                                <li class="breadcrumb-item">My FYP evaluation</li>
                                <li class="breadcrumb-item active">My evaluation result</li>
                            </ol>

                            <div class="row justify-content-md-left">
                                <div class="col-2">
                                    <p>Project ID: </p>
                                </div>
                                <div class="col-3">
                                    <p><?php echo $projectDetails->getProjID(); ?></p>
                                </div>
                            </div>

                            <div class="row justify-content-md-left mb-3">
                                <div class="col-2">
                                    <p>Project Title: </p>
                                </div>
                                <div class="col-3">
                                    <p><?php echo $projectDetails->getProjTitle(); ?></p>
                                </div>
                            </div>

                            <div class="card row mx-auto mb-3">
                                <div class="card-header">
                                    FYP 1 Result
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="ev_fyp_1_table" class="table table-bordered border-dark">
                                            <thead>
                                                <tr class="header-bg">
                                                    <th scope="col">Submission</th>
                                                    <th scope="col">Evaluator ID</th>
                                                    <th scope="col">Evaluator Name</th>
                                                    <th scope="col">Project Feedback</th>
                                                    <th scope="col">Evaluation Mark</th>
                                                </tr>
                                            </thead>
                                            <tbody id="result_fyp_1">
                                                <!-- Show datatable here -->
                                                <?php
                                                displayFyp1Result($_SESSION['stud_id']);
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card row mx-auto mb-3">
                                <div class="card-header">
                                    FYP 2 Result
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="ev_fyp_2_table" class="table table-bordered border-dark">
                                            <thead>
                                                <tr class="header-bg">
                                                    <th scope="col">Submission</th>
                                                    <th scope="col">Evaluator ID</th>
                                                    <th scope="col">Evaluator Name</th>
                                                    <th scope="col">Project Feedback</th>
                                                    <th scope="col">Evaluation Mark</th>
                                                </tr>
                                            </thead>
                                            <tbody id="result_fyp_2">
                                                <!-- Show datatable here -->
                                                <?php
                                                displayFyp2Result($_SESSION['stud_id']);
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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