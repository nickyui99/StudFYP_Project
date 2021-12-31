<?php
include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php';

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../../css/module_1.css" />  
</head>
<body>
<div class="container">
<form action="" method="post">
<h1>Delete Industrial Panel's Data </h1>
 <table class="form-group">
 <tr>
<th style=text-align:right; >Enter Industrial Panel's ID: </th>
 <td><input type="text" name="getipid" class="form-control"><input type="submit" class="btn btn-primary" name="Search" value="Search"></td>
</tr> 
 <table>
 </form>
 <?php 
  session_start(); 
if(isset($_POST['Search']))
{    if(empty($_POST['getipid']))
  {
     echo '<script type="text/javascript">';
     echo ' alert("Required to fill up everything!")'; 
     echo '</script>';
  }else{
  $getipid = $_POST['getipid']; 
$delete = "SELECT ip_id,ip_name, ip_contact_num,ip_company,ip_password,ip_email FROM industrial_panel where ip_id = '$getipid' ";
$result = $db->query($delete);
echo"<table width=70% border=1 cellspacing=0 cellpadding=10>";	
if ($result->num_rows > 0) {
	$_SESSION['getipid'] = $getipid;	
	echo"<tr>";
	echo"<th>Industrial Panel ID</th>";
	echo"<th>Name</th>";
	echo"<th>Password</th>";
	echo"<th>Email</th>";
	echo"<th>Phone Number</th>";
	echo"<th>Company</th>";
	echo"</tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo"<tr>";
	echo "<td>".$row["ip_id"]."</td>";
	echo "<td>".$row["ip_name"]."</td>";
	echo "<td>".$row["ip_password"]."</td>";
	echo "<td>".$row["ip_email"]."</td>";
	echo "<td >".$row["ip_contact_num"]."</td>";  
	echo "<td >".$row["ip_company"]."</td>";  
	 echo"</tr>";	
	 echo"</table>";
	 echo "<input class='button'  type='submit' name='Delete' value='Delete'>";  
	} }
	else {
	echo "0 results";
	}}}
	if(isset($_POST['Delete']))
	{		  
$sql = "DELETE FROM industrial_panel where ip_id  = '".$_SESSION['getipid']."'";
if ($db->query($sql) === TRUE) {
	echo '<script type="text/javascript">';
	echo ' alert("Record deleted successfully!")'; 
	echo '</script>';
  } else {
	echo "Error deleting record: " . $db->error;
  }
  $db->close();
} 
?> 
 </div>
</body>
</html>