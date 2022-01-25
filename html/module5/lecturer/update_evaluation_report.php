<!DOCTYPE html>
<html lang="en">

<!-- This html template is only for StudFYP lecturer only -->

<?php
include $_SERVER["DOCUMENT_ROOT"] . '/html/module5/Controller/LecturerHandler.php';

session_start();

if (isset($_SESSION['update_er_array'])) {

    $er_array = $_SESSION['update_er_array'];
    $er_report_array = array();

    if (isset($_SESSION['er_report_array'])) {
        $er_report_array = $_SESSION['er_report_array'];
    } else {
        $er_report_array = getUpdateEvaluationReportList($er_array);
    }

    //Current pagination evaluation data
    $current = $er_report_array[$_GET['view']];
    $evaluateDetails = getEvaluationDetail($current->getProjID(), $current->getStudID(), $current->getSubmission());

    //Retrieve all the rubrics
    $ev_rubric_array = getEvaluationRubric($current->getSubmission(),  $evaluateDetails->getFypLevel());

    //Get previous mark given
    $current_mark = $current->getMark();
} else {
    //if there is no update er id return back to evaluation report page
    header("evaluation_report.php");
}
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evaluate FYP</title>

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
                        <a class="nav-link" href="index.html">
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
                            FYP evaluation
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse show" id="collapseEvaluation" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav nav-pills nav-fill">
                                <a class="nav-link" href="#">
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

        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <div class="card shadow my-3">
                        <div class="card-body p-3">
                            <h1 class="mt-4">Update FYP Evaluation</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item">
                                    FYP evaluation
                                </li>
                                <li class="breadcrumb-item active">Evaluation Report</li>
                                <li class="breadcrumb-item active">Update FYP</li>
                            </ol>


                            <nav aria-label="...">
                                <ul class="pagination">

                                    <?php

                                    //Previous button
                                    if ($_GET['view'] == 0) {
                                        echo '<li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" id="btn_previous" aria-disabled="true">Previous</a>
                                        </li>';
                                    } else {
                                        echo '<li class="page-item">
                                        <a class="page-link" href="update_evaluation_report.php?view=' . $_GET['view'] - 1 . '" tabindex="-1" id="btn_previous" onClick="saveSession();" aria-disabled="true">Previous</a>
                                        </li>';
                                    }

                                    //Print All Available Page
                                    for ($i = 0; $i < count($er_report_array); $i++) {
                                        $page_num = $i + 1;
                                        if ($i == $_GET['view']) {
                                            echo '<li class="page-item active"><a class="page-link" href="update_evaluation_report.php?view=' . $i . '" onClick="saveSession();">' . $page_num . '</a></li>';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="update_evaluation_report.php?view=' . $i . '" onClick="saveSession();">' . $page_num . '</a></li>';
                                        }
                                    }

                                    //Pagination Next Button
                                    if ($_GET['view'] == count($er_report_array) - 1) {
                                        echo    '<li class="page-item disabled">
                                        <a class="page-link" href="#" onClick="saveSession();">Next</a>
                                        </li>';
                                    } else {
                                        echo    '<li class="page-item">
                                        <a class="page-link" href="update_evaluation_report.php?view=' . $_GET['view'] + 1 . '">Next</a>
                                        </li>';
                                    }
                                    ?>
                                </ul>
                            </nav>

                            <form id="evaluation_form" action="evaluation_report.php">
                                <div class="card mb-3 p-3">
                                    <div class="form-group">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr class="">
                                                    <td class="col-sm-2">Result ID: </td>
                                                    <td class="col-sm-7"><input type="text" class="form-control" id="inputResultId" name="inputResultId" value="<?php echo $current->getResultId(); ?>" readonly></td>
                                                    <td class="col-sm-3" rowspan="4">
                                                        <div class="card text-center">
                                                            <div class="card-body">
                                                                <h4 class="mb1">Project QR Code</h4>
                                                                <img name="QR_code" src="data:image/jpeg;base64, <?php echo $evaluateDetails->getProjQR(); ?>" alt="Project QR Code" class="img-container mb-1">
                                                                <button type="button" id="btnDownloadProjQR" class="btn btn-outline-dark"><i class="fa fa-download me-3" aria-hidden="true"></i>Download QR Code</button>
                                                            </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Student ID: </td>
                                                    <td><input type="text" class="form-control" id="inputStudId" name="inputStudId" value="<?php echo $current->getStudId() ?>" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-sm-2">Project ID: </td>
                                                    <td class="col-sm-7"><input type="text" class="form-control" id="inputProjId" name="inputProjId" value="<?php echo $current->getProjId() ?>" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>Project title:</td>
                                                    <td><input type="text" class="form-control" id="inputProjTitle" name="inputProjTitle" value="<?php echo $current->getProjTitle() ?>" readonly></td>
                                                </tr>

                                                <tr>
                                                    <td>FYP Stage: </td>
                                                    <td><input type="text" class="form-control" id="inputFypStage" name="inputFypStage" value="<?php echo $current->getFypStage() ?>" readonly></td>
                                                </tr>

                                                <tr>
                                                    <td>Project Logbook: </td>
                                                    <td>
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr class="header-bg">
                                                                    <th class="col-sm-3">Date</th>
                                                                    <th class="col-sm-9">Activity</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- Project logbook result -->
                                                                <?php printProjLogbook($current->getProjID(), $current->getSubmission()) ?>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Project Document: </td>
                                                    <td><button type="button" id="btnDownloadProjDoc" class="btn btn-outline-dark"><i class="fa fa-download me-3" aria-hidden="true"></i>Download</button></td>
                                                </tr>
                                                <tr>
                                                    <td>Evaluation Rubric: </td>
                                                    <td>
                                                        <div class="table-responsive">
                                                            <table id="rubrics" class="table table-bordered border-dark table-sm">
                                                                <thead class="">
                                                                    <tr class="header-bg">
                                                                        <th class="small" style="width: 10%;">Num</th>
                                                                        <th class="small" style="width: 20%;">Rubric Title</th>
                                                                        <th class="small" style="width: 25%;">Rubric Details</th>
                                                                        <th class="small" style="width: 15%;">Weightage</th>
                                                                        <th class="small" style="width: 15%;">Mark</th>
                                                                        <th class="small" style="width: 15%;">Actual Mark</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="rubric_result">
                                                                    <!-- Evaluation Rubric Result -->
                                                                    <?php printEvaluationRubric($current->getSubmission(), $evaluateDetails->getFypLevel()); ?>
                                                                    <tr class="header-bg border-dark">
                                                                        <td class="text-end" colspan="5"><b>Total:</b></td>
                                                                        <td><input type="text" readonly class="form-control-plaintext" id="total_mark" name="total_mark" value=""></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Project Feedback: </td>
                                                    <td>
                                                        <textarea id="inputProjFeedback" name="inputProjFeedback" class="form-control" cols="30" rows="5" maxLength="300" required></textarea>
                                                        <div class="float-end" id="the-count">
                                                            <span id="current">0</span>
                                                            <span id="maximum">/ 300</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-center">
                                            <input type="submit" class="btn btn-outline-dark m-3" name="submit" id="submit" value="Submit">
                                            <input type="reset" class="btn btn-outline-dark m-3" name="reset" id="reset" value="Reset">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    $('textarea').keyup(function() {
        var characterCount = $(this).val().length,
            current = $('#current'),
            maximum = $('#maximum'),
            theCount = $('#the-count');

        current.text(characterCount);
    });

    $(document).ready(function() {
        setPreviousEvaluationResults();
        calcTotalMark();

        $('#btnDownloadProjQR').click(function() {
            window.open("http://localhost/StudFYP_Project/html/module5/Controller/DownloadService.php?projQr=<?php echo $current->getProjID(); ?>");
        });

        $('#btnDownloadProjDoc').click(function() {
            window.open("http://localhost/StudFYP_Project/html/module5/Controller/DownloadService.php?projDoc=<?php echo $current->getProjID(); ?>&submission=<?php echo $current->getSubmission(); ?>");
        });

        $('#evaluation_form').submit(function() {
            saveSession();
            var form = $(this);

            $.ajax({
                type: "POST",
                url: "../Controller/EvaluateLectFormHandler.php",
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    alert("Evaluation result updated");
                }
            });
        });
    });

    function saveSession() {

        const result_id = "<?php echo $current->getResultId(); ?>";

        const rubric_id_array =
            <?php
            $rubric_id_array = array();
            foreach ($current_mark as $mark) {
                array_push($rubric_id_array, $mark->getEvaluationRubricId());
            }
            echo json_encode($rubric_id_array);
            ?>;

        const rubric_mark_array = [];
        for (var i = 0; i < rubric_id_array.length; i++) {
            rubric_mark_array.push($('#am_' + rubric_id_array[i]).val());
        }

        const feedback = $('#inputProjFeedback').val();

        saveLectTempEv(result_id, rubric_id_array, rubric_mark_array, feedback);
    }



    function setPreviousEvaluationResults() {
        <?php
        foreach ($current_mark as $mark) {
            echo 'var weightage = $("#w_' . $mark->getEvaluationRubricId() . '").html();';
            echo 'var selected_val = Math.round(' . $mark->getActualMark() . '/ weightage);';
            echo "$('#" . $mark->getEvaluationRubricId() . " option[value=' + selected_val + ']').attr('selected','selected');";
            echo "$('#am_" . $mark->getEvaluationRubricId() . "').val('" . $mark->getActualMark() . "');";
        }

        echo "$('#inputProjFeedback').val('" . $current->getEvaluationFeedback() . "');";
        ?>
    }

    function calcActualMark(object) {
        var id = $(object).attr('id');
        var weightage = $("#w_" + id).html();
        var actual_mark = weightage * object.value;
        document.getElementById("am_" + id).value = actual_mark.toFixed(2);
        calcTotalMark();
    }

    function calcTotalMark() {
        var total = 0;
        var num_rubric = <?php echo count($ev_rubric_array); ?>;
        <?php
        foreach ($ev_rubric_array as $ev_rubric) {
            echo 'total = total + parseFloat(document.getElementById("am_' . $ev_rubric->getRubricId() . '").value);';
        }
        ?>
        document.getElementById("total_mark").value = total.toFixed(2);
    }
</script>

</html>