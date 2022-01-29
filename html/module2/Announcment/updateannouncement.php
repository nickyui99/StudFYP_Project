<?php
/*$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'studfyp_db');*/

include_once '../../../mySQLi/config.php';

    if(isset($_POST['updatedata']))
    {
        $announcement_id = $_POST['update_id'];

        $announcement_title = $_POST['announcement_title'];
        $announcement_description = $_POST['announcement_description'];

        $query = "UPDATE announcement SET announcement_title='$announcement_title' WHERE announcement_id='$announcement_id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:Announcement.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>
