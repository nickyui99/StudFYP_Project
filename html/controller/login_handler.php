
<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/mySQLi/config.php";
session_start();

//Updated to use SQL prepared statement to prevent SQL injection
//Contributor: Chia Hui, Nicholas
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
            case "student":
                $stmt = $db->prepare('SELECT stud_id, stud_name FROM student WHERE stud_id =? AND stud_password =?');
                $stmt->bind_param('ss', $id, $pass);
                $stmt->execute();
                $stmt->bind_result($stud_id, $stud_name);
                $stmt->store_result();

                if ($stmt->num_rows() == 1) {
                    $stmt->fetch();
                    $_SESSION['stud_id'] = $stud_id;
                    $_SESSION['username'] = $stud_name;
                    echo "<script>window.open('../student_main.php','_self')</script>";
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Incorrect Username and Password.\nPlease Try again !")';
                    echo '</script>';
                    echo "<script>window.open('../../index.php','_self')</script>";
                }

                $stmt->close();
                mysqli_close($db);
                break;

            case "administrator":
                $stmt = $db->prepare('SELECT admin_id, admin_name FROM administrator WHERE admin_id =? AND admin_password =?');
                $stmt->bind_param('ss', $id, $pass);
                $stmt->execute();
                $stmt->bind_result($admin_id, $admin_name);
                $stmt->store_result();

                if ($stmt->num_rows() == 1) {
                    $stmt->fetch();
                    $_SESSION['admin_id'] = $admin_id;
                    $_SESSION['username'] = $admin_name;
                    echo "<script>window.open('../admin_main.php','_self')</script>";
                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("Incorrect Username and Password.\nPlease Try again !")';
                    echo '</script>';
                    echo "<script>window.open('../../index.php','_self')</script>";
                }
                $stmt->close();
                mysqli_close($db);
                break;

            case "staff":
                $stmt = $db->prepare('SELECT lect_id, lect_name FROM lecturer WHERE lect_id =? AND lect_password=?');
                $stmt->bind_param('ss', $id, $pass);
                $stmt->execute();
                $stmt->bind_result($lect_id, $lect_name);
                $stmt->store_result();

                if ($stmt->num_rows() == 1) {
                    $stmt->fetch();
                    $_SESSION['lect_id'] = $lect_id;
                    $_SESSION['username'] = $lect_name;
                    echo "<script>window.open('../lecturer_main.php','_self')</script>";
                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("Incorrect Username and Password.\n Please Try again !")';
                    echo '</script>';
                    echo "<script>window.open('../../index.php','_self')</script>";
                }
                mysqli_close($db);
                break;

            case "external":
                echo "external";
                $stmt = $db->prepare("SELECT * FROM industrial_panel WHERE ip_id =? AND ip_password=?");
                $stmt->bind_param('ss', $id, $pass);
                $stmt->execute();
                $stmt->bind_result($ip_id, $ip_name);
                $stmt->store_result();
                if ($stmt->num_rows() == 1) {
                    $stmt->fetch();
                    $_SESSION['ip_id'] = $ip_id;
                    $_SESSION['username'] = $ip_name;
                    echo "<script>window.open('../external_main.php','_self')</script>";
                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("Incorrect Username and Password.\n Please Try again !")';
                    echo '</script>';
                    echo "<script>window.open('../../index.php','_self')</script>";
                }
                mysqli_close($db);
                break;
        }
    }
}
?>