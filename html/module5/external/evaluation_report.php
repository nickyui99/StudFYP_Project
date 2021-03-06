<!DOCTYPE html>
<html lang="en">

<!-- /**
 * Name: Nicholas Ooi Zhee Chen
 * Matric Id: CB19080
 */ -->

<?php
include $_SERVER["DOCUMENT_ROOT"] . '/html/module5/Controller/ExternalHandler.php';
include $_SERVER["DOCUMENT_ROOT"] . '/html/controller/AnnouncementHandler.php';
session_start();
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Assigned FYP</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="../../../bootstrap_v5.1/css/styles.css" />

    <!-- Bootstrap 5 JavaScript -->
    <script src="../../../bootstrap_v5.1/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Fontawesome CSS -->
    <script src="https://use.fontawesome.com/8134766fa6.js"></script>

    <!-- Chart js  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../../../css/main.css" />
    <link rel="stylesheet" href="../../../css/module_5.css" />

    <!-- JS -->
    <script src="../../../js/module_5.js"></script>
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
                        <a class="dropdown-item see-more-notification" href="/html/external_main.php">See more ...</a>
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
                        <a class="nav-link" href="../../external_main.php">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-tachometer" aria-hidden="true"></i>
                            </div>
                            Dashboard
                        </a>

                        <!-- FYP Evaluation -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEvaluation" aria-expanded="false" aria-controls="collapseEvaluation">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            FYP evaluation
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse show" id="collapseEvaluation" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav nav-pills nav-fill">
                                <a class="nav-link" href="view_assigned_fyp.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>View assigned FYP
                                </a>
                                <a class="nav-link text-light active" href="evaluation_report.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin text-light" aria-hidden="true"></i>
                                    </div>Evaluation report
                                </a>
                            </nav>
                        </div>

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

        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Evaluation Report</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">
                            FYP evaluation
                        </li>
                        <li class="breadcrumb-item active">Evaluation report</li>
                    </ol>

                    <div class="card shadow my-3">
                        <div class="card-body p-3">
                            <div id="message_box">
                                <!-- This div is for showing message purpose only -->
                            </div>

                            <div class="row mb-2">
                                <p class="col-sm-1">Actions: </p>

                                <div class="col-sm-8">

                                    <button type="button" name="btn_update" id="btn_update" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus me-2"></i>Update
                                    </button>

                                    <button type="button" name="btn_delete" id="btn_delete" class="btn btn-danger btn-sm" data-bs-toggle="modal">
                                        <i class="fa fa-trash me-2" aria-hidden="true"></i>Delete
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade " id="confirm_delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="checked_report">

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" id="btn_confirm_delete">Delete</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Update modal -->
                                    <div class="modal fade " id="confirm_update_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="update_modal_label">Confirm Update </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="checked_list">

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" id="btn_confirm_update">Update</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade " id="alert_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="alertModalLabel">Alert</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div id="alert_message" class="alert alert-danger" role="alert">

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" id="btn_ok_alert" data-bs-dismiss="modal">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Search bar -->
                                <div class="form-outline col-sm-3">
                                    <div class="form-group has-search">
                                        <span class="fa fa-search form-control-feedback"></span>
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Search Student ID or Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <!-- Evaluation panel counter -->
                                <p id="row_counter" class="col-sm-3 my-auto text-secondary">Total 0 Evaluation Report</p>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="header-bg">
                                                <th class="small" style="width: 4%;">List</th>
                                                <th class="small" style="width: 8%;">Result ID</th>
                                                <th class="small" style="width: 8%;">Project ID</th>
                                                <th class="small" style="width: 8%;">Student ID</th>
                                                <th class="small" style="width: 13%;">Project Title</th>
                                                <th class="small" style="width: 8%;">FYP Stage</th>
                                                <th class="small" style="width: 8%;">Submission</th>
                                                <th class="small" style="width: 8%;">Evaluation Mark</th>
                                                <th class="small" style="width: 10%;">Evaluation Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="result">
                                            <!-- Show datatable here -->

                                        </tbody>
                                        <tfoot>
                                            <tr class="header-bg">
                                                <th class="small" style="width: 4%;">List</th>
                                                <th class="small" style="width: 8%;">Result ID</th>
                                                <th class="small" style="width: 8%;">Project ID</th>
                                                <th class="small" style="width: 8%;">Student ID</th>
                                                <th class="small" style="width: 13%;">Project Title</th>
                                                <th class="small" style="width: 8%;">FYP Stage</th>
                                                <th class="small" style="width: 8%;">Submission</th>
                                                <th class="small" style="width: 8%;">Evaluation Mark</th>
                                                <th class="small" style="width: 10%;">Evaluation Date</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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

<script>
    $(document).ready(function() {
        var ip_id = "<?php echo $_SESSION['ip_id']; ?>";
        loadIpEvaluationReport("", ip_id);

        $('#search').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                loadIpEvaluationReport(search, ip_id);
            } else {
                loadIpEvaluationReport("", ip_id);
            }
        });

        $('#btn_confirm_delete').click(function() {
            deleteIpErArray(checkedList());
        });

        $('#btn_confirm_update').click(function() {
            updateIpErArray(checkedList());
        });

        $('#btn_delete').click(function() {

            checkedArrays = checkedList();

            if (checkedArrays.length == 0) {
                var output = "No row selected";
                document.getElementById("alert_message").innerHTML = output;
                $('#alert_modal').modal('show');
            } else {
                var output = "Are you sure to DELETE this evaluation report? <ul>";
                for (var i = 0; i < checkedArrays.length; i++) {
                    output = output + "<li>" + checkedArrays[i] + "</li>";
                }
                output = output + "</ul>"
                document.getElementById("checked_report").innerHTML = output;
                $('#confirm_delete_modal').modal('show');
            }
        });

        $('#btn_update').click(function() {
            checkedArrays = checkedList();

            if (checkedArrays.length == 0) {
                var output = "No row selected";
                document.getElementById("alert_message").innerHTML = output;
                $('#alert_modal').modal('show');
            } else {
                var output = "Are you sure to UPDATE this evaluation report? <ul>";
                for (var i = 0; i < checkedArrays.length; i++) {
                    output = output + "<li>" + checkedArrays[i] + "</li>";
                }
                output = output + "</ul>"
                document.getElementById("checked_list").innerHTML = output;
                $('#confirm_update_modal').modal('show');
            }
        });

    });

    function checkedList() {
        var check_list = [];
        const result_id_array =
            <?php
            $ev_report_array = getEvaluationReport($_SESSION['ip_id']);
            $result_id_array = array();
            foreach ($ev_report_array as $ev_report) {
                //Push result id array
                array_push($result_id_array, $ev_report->getResultId());
            }
            //Print result id array
            echo json_encode($result_id_array);
            ?>;

        for (let i = 0; i < result_id_array.length; i++) {
            if (document.getElementById("cb_" + result_id_array[i]).checked == true) {
                check_list.push(result_id_array[i]);
            };
        }

        return check_list;
    }
</script>

</html>