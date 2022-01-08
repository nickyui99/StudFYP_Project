<?php
session_start();

//For student logout
if(isset($_SESSION['stud_id'])){
    unset($_SESSION["stud_id"]);
    unset($_SESSION["username"]);
}

//For lecturer logout
else if(isset($_SESSION['lect_id'])){
    unset($_SESSION["lect_id"]);
    unset($_SESSION["username"]);
}

//For administrator logout
else if(isset($_SESSION['admin_id'])){
    unset($_SESSION["admin_id"]);
    unset($_SESSION["username"]);
}

//For industrial panel logout
else if(isset($_SESSION['ip_id'])){
    unset($_SESSION["ip_id"]);
    unset($_SESSION["username"]);
}

header("Location:../index.php");
