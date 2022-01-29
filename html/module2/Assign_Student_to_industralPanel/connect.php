<?php
session_start();
/*$con = mysqli_connect("localhost","root","","studfyp_db");*/

include_once '../../../mySQLi/config.php';

if(isset($_POST['save_select']))
{
    $stud_id = $_POST['stud_id'];
    $ip_id = $_POST['ip_id'];

    $query = "INSERT INTO assigned_industrial_evaluator (stud_id,ip_id) VALUES ('$stud_id','$ip_id')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Inserted Succesfully";
        
    }
    else
    {
        $_SESSION['status'] = "Not Inserted";

    }
}
?>
