


<!DOCTYPE html>  
<html>
       <link rel="stylesheet" type="text/css" href="../../css/module_1.css" />  
<body>
<?php
include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php' ; 

$a = "SELECT * FROM administrator";
$s = "SELECT * FROM student";
$l = "SELECT * FROM lecturer";
$c = "SELECT * FROM fyp_coordinator  WHERE coordinate_psm_level !='NULL'";
$ip = "SELECT * FROM industrial_panel";

echo"<div class='container'>" ; 
echo"<form>" ; 
echo"<h1>Total Registered User </h1>";
echo"<table class=gotable>" ; 
    
echo"<tr>"; 
echo"<td>User</td>";
echo "<td>Number of User</td>";
echo"<br>" ; 
echo"</tr>"; 

if ($admin=mysqli_query($db,$a)) {
    $numa=mysqli_num_rows($admin);
    echo"<tr>"; 
    echo"<td>Administrator</td>";
    echo "<td>".$numa."</td>";
    echo"<br>" ; 
    echo"</tr>"; 
}


if ($student=mysqli_query($db,$s)) {
    $nums=mysqli_num_rows($student);
    echo"<tr>"; 
    echo"<td>Student</td>";
    echo "<td>".$nums."</td>";
    echo"</tr>"; 
}

if ($lecturer=mysqli_query($db,$l)) {
    $numl=mysqli_num_rows($lecturer);
    echo"<tr>"; 
    echo"<td>Lecturer</td>";
    echo "<td>".$numl."</td>";
    echo"</tr>"; 
}

if ($coordinator=mysqli_query($db,$c)) {
    $numc=mysqli_num_rows($coordinator);
    echo"<tr>"; 
	echo"<td>Coordinator</td>";
    echo "<td>".$numc."</td>"; 
    echo"</tr>"; 
}

if ($industrialpanel=mysqli_query($db,$ip)) {
    $numi=mysqli_num_rows($industrialpanel);
    echo"<tr>"; 
    echo"<td>Industrial Panel</td>";
    echo "<td>".$numi."</td>";
    echo"</tr>";
} 

echo"<tr>";
echo"<td>Total Registered user for the System</td>";
$ttl = $numa+$nums+$numl+$numc+$numi ; 
echo "<td>".$ttl."</td>";
echo"</tr>";
echo"</table>" ; 
$db->close();
echo"</form>"; 
echo"</div>";
?>

</body> 

</html>
