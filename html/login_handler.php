
<?php
include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php';
session_start();

if (isset($_POST['Login'])) {
    if (empty($_POST['f_loginUserID']) || empty($_POST['f_loginUserPass'])) {
        echo '<script type="text/javascript">';
        echo ' alert("Input cannot be null !")';
        echo '</script>';
        echo "<script>window.open('loginpage.php','_self')</script>";
    } else {
        $id = $_POST['f_loginUserID'];
        $pass = $_POST['f_loginUserPass'];
        $type = $_POST['f_userClass'];
        switch ($type) {
            case "student";
                $sql_query = "SELECT * FROM student WHERE stud_id ='$id' AND stud_password= '$pass'";
                $result = mysqli_query($db, $sql_query);
                if (mysqli_num_rows($result) > 0) {
                    $row = $result->fetch_assoc();
                    $_SESSION['id'] = $row['stud_id'];
                    $_SESSION['username'] = $row['stud_name'];
                    echo "<script>window.open('student_main.php','_self')</script>";
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Incorrect Username and Password.\n Please Try again !")';
                    echo '</script>';
                    echo "<script>window.open('loginpage.php','_self')</script>";
                }
                mysqli_close($db);
                break;

            case "administrator";
                $check_admin = "SELECT * FROM administrator WHERE admin_id ='$id' AND admin_password= '$pass'";
                $goadmin = mysqli_query($db, $check_admin);
                if (mysqli_num_rows($goadmin) > 0) {
                    $_SESSION['id'] = $id;
                    echo "<script>window.open('admin_main.php','_self')</script>";
                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("Incorrect Username and Password.\n Please Try again !")';
                    echo '</script>';
                    echo "<script>window.open('loginpage.php','_self')</script>";
                }
                mysqli_close($db);
                break;

            case "staff";
                $check_lect = "SELECT * FROM lecturer WHERE lect_id ='$id' AND lect_password= '$pass'";
                $golect = mysqli_query($db, $check_lect);
                if (mysqli_num_rows($golect) > 0) {
                    $_SESSION['id'] = $id;
                    echo "<script>window.open('lecturer_main.php','_self')</script>";
                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("Incorrect Username and Password.\n Please Try again !")';
                    echo '</script>';
                    echo "<script>window.open('loginpage.php','_self')</script>";
                }
                mysqli_close($db);
                break;

            case "external";
                $check_ip = "SELECT * FROM industrial_panel WHERE ip_id ='$id' AND ip_password= '$pass'";
                $goip = mysqli_query($db, $check_ip);
                if (mysqli_num_rows($goip) > 0) {
                    $_SESSION['id'] = $id;
                    echo "<script>window.open('industrialpanel_template.php','_self')</script>";
                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("Incorrect Username and Password.\n Please Try again !")';
                    echo '</script>';
                    echo "<script>window.open('loginpage.php','_self')</script>";
                }
                mysqli_close($db);
                break;
        }
    }
}
?>