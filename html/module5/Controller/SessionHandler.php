<?php
    session_start();
    if (isset($_POST['update_er'])) {
        $_SESSION['update_er_array'] = $_POST['update_er'];
    } 
?>