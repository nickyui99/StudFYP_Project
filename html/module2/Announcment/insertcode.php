<?php

/*$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'studfyp_db');*/

include_once '../../../mySQLi/config.php'; 


if(isset($_POST['insertdata']))
{
    $announcement_title = $_POST['announcement_title'];
    $announcement_description = $_POST['announcement_description'];


    $query = "INSERT INTO announcement (`announcement_title`,`announcement_description`) VALUES  ('$announcement_title','$announcement_description')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: Announcement.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>
