<?php
session_start();
$con = mysqli_connect("localhost","root","","studfyp_db");

if(isset($_POST['save_select']))
{
    $stud_id = $_POST['stud_id'];
    $ip_id = $_POST['ip_id'];

    $query = "INSERT INTO assigned_industrial_evaluator (stud_id,ip_id) VALUES ('$stud_id','$ip_id')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Inserted Succesfully";
        header("Location: Assign_IP_to_student.php");
    }
    else
    {
        $_SESSION['status'] = "Not Inserted";
        header("Location: Assign_IP_to_student.php");
    }
}
?>
