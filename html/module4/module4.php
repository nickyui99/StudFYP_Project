<!DOCTYPE html>
<html lang="en">

<!-- /**
 * Name: Lutfil Hadi Ahnaf Bin Mokhtar
 * Matric Id: CB20019
 */ -->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="../../bootstrap_v5.1/css/styles.css" />

    <!-- Bootstrap 5 JavaScript -->
    <script src="../../bootstrap_v5.1/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

    <!-- Fontawesome CSS -->
    <script src="https://use.fontawesome.com/8134766fa6.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/main.css" />

    <!-- JS -->
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img class="logo ms-3" src="../../images/ump_logo.png" alt="UMP" />
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
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
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
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseCoordinator" aria-expanded="false"
                            aria-controls="collapseCoordinator">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            FYP coordinator
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseCoordinator" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
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
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseSupervisor" aria-expanded="false"
                            aria-controls="collapseSupervisor">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            FYP supervisor
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseSupervisor" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
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
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseEvaluation" aria-expanded="false"
                            aria-controls="collapseEvaluation">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-columns"></i>
                            </div>
                            FYP evaluation
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseEvaluation" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon">
                                        <i class="fa fa-circle-thin" aria-hidden="true"></i>
                                    </div>View assigned FYP
                                </a>
                                <a class="nav-link" href="#">
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
                    username
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">My Profile</li>
                    </ol>
                    <div class="card mb-4">
                    <?php require_once 'process.php'; ?> 

                    <?php
                        if (isset($_SESSION['message'])):?>
                        <div class="alert alert-<?=$_SESSION['msg_type']?>">
                        <?php
                            echo  $_SESSION['message'];
                            unset ($_SESSION['message']);
                        ?>
                        <?php endif ?>
                        </div>
                        <div class="container>
                        <?php 
                        $mysqli= new mysqli('localhost', 'root','','studfyp_db') or die(mysqli_error($mysqli));
                        $result= $mysqli->query("SELECT * FROM fyp_supervisor") or die($mysqli->error);
                        ?>
                         <div class="row justify-content-center">
                            <table class="table">
                             <thead>
                                 <tr>
                                     <th>Name</th>
                                     <th>Phone Number</th>
                                     <th>Email</th>
                                     <th>Address</th>
                                     <th colspan="2">Action</th>
                            </thead>
                            <?php while($row=$result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['supervisor_name'];?></td>
                                    <td><?php echo $row['supervisor_name'];?></td>
                                    <td><?php echo $row['supervisor_name'];?></td>
                                    <td><?php echo $row['supervisor_name'];?></td>
                                    <td>
                                     <a href="module4.php?edit=<?php echo $row['id'];?>"
                                      class="btn btn-info">Edit</a>
                                      <a href="process.php?delete=<?php echo $row['id'];?>"
                                      class="btn btn-danger">Delete</a>
                                    </td> 

                               </tr>
                          <?php endwhile;?>
                           </table>
                        </div>

                        <?php
                        function pre_r($array)
                        {
                            echo '<pre>';
                            print_r($array);
                            echo '</pre>';
                        }
                        ?>

                        <div class="row justify-content-center" >
                       <form action="process.php" method="POST">
                           <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                           <label>Name:</label>
                           <input type="text" name="name" class="form-control" value="<?php echo $name;?>">
                        </div>
                        <div class="form-group">
                           <label>Phone Number:</label>
                           <input type="text" name="phonenum" class="form-control" value="<?php echo $phonenum;?>"><br>
                           </div>
                           <div class="form-group">
                           <label>Email:</label>
                           <input type ="email" name="email" class="form-control" value="<?php echo $email;?>"><br>
                           </div>
                           <div class="form-group">
                           <label>Address:</label>
                           <input type="textarea" name="address" class="form-control" value="<?php echo $address;?>"><br>
                           </div>
                           <div class="form-group">
                           
                         
                           <button type="submit" class="btn btn-primary" name="save">Save</button>
                           </div>
                       </form>
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