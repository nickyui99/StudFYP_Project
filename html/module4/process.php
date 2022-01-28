<?php
/**
 * Name: Lutfil Hadi Ahnaf Bin Mokhtar
 * Matric Id: CB20019
 */

$mysqli = new mysqli ('localhost', 'root','','supervisor') or die(mysqli_error($mysqli));

$update= false;
$id=0;
$name='';
$phonenum='';
$email='';
$address='';

if (isset($_POST['save']))
{
    $name=$_POST['name'];
    $phonenum=$_POST['phonenum'];
    $email=$_POST['email'];
    $address=$_POST['address'];

    $mysqli->query("INSERT INTO Supervisor (name,phonenum,email,address) VALUES ('$name','$phonenum','$email','$address') ") or 
    die($mysqli->error);

    $_SESSION['message']="Record has been saved!";
    $_SESSION['msg_type']="Success";

    header("location: module4.php");
}

if (isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM Supervisor WHERE id=$id") or die ($mysqli->error());

    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="Are you sure";

    header("location: module4.php");
}

    
if (isset($_POST['update']))
{
    $name=$_POST['name'];
    $phonenum=$_POST['phonenum'];
    $email=$_POST['email'];
    $address=$_POST['address'];

    $mysqli->query("UPDATE Supervisor SET name='$name',phonenum ='$phonenum',email='$email',address='$address' WHERE id=$id") or 
    die($mysqli->error);

    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="Are you sure";

    header("location: module4.php");
}
