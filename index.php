<!DOCTYPE html>
<html lang="en">

<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/html/controller/login_handler.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudFYP | Login Page</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="bootstrap_v5.1/css/styles.css" />

    <!-- Bootstrap 5 JavaScript -->
    <script src="bootstrap_v5.1/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Fontawesome CSS -->
    <script src="https://use.fontawesome.com/8134766fa6.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css" />

    <!-- JS -->
</head>

<body class="login_bg">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img class="logo ms-3" src="images/ump_logo.png" alt="UMP" />
        <a class="navbar-brand ms-3 me-0" href="index.html">StudFYP</a>
    </nav>

    <!-- Main Content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container pt-5 pb-5">
                <div class="card rounded mx-auto w-25">
                    <div class="card-body">
                        <h1 class="card-title text-center mt-3 mb-3">StudFYP Login</h1>
                        <form class="mt-3" action="html/controller/login_handler.php" method="post">

                            <!-- Username -->
                            <div class="form-group mb-3">
                                <label for="f_userID">Username: </label>
                                <input class="form-control" type="text" name="f_loginUserID" required>
                            </div>

                            <!-- Password -->
                            <div class="form-group mb-3">
                                <label for="f_loginUserPass">Password: </label>
                                <input class="form-control" type="password" name="f_loginUserPass" required>
                            </div>

                            <div class="form-group">
                                <label for="f_userClass">Login as: </label>
                                <select class="form-select form-control" name="f_userClass" id="f_userClass">
                                    <option value="student" selected>Student</option>
                                    <option value="staff">Staff</option>
                                    <option value="external">External</option>
                                    <option value="administrator">System administrator</option>
                                </select>
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <input class="btn btn-primary form-control mt-3" type="submit" name="Login" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light fixed-bottom">
            <div class="container-fluid px-4">
                <div class="text-muted text-center">
                    Copyright &copy; University Malaysia Pahang 2021
                </div>
            </div>
        </footer>
    </div>
</body>

</html>