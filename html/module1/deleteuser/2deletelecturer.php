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
<h1>Delete Lecturer's Data </h1>
<table class="au" margin-left="auto" margin-right="auto">
 <tr>
<th style=text-align:right; >Enter Lecturer's ID: </th>
 <td><input type="text" name="getlectid" class="form-control"><input type="submit" class="btn btn-primary" name="Search" value="Search"></td>
</tr> 
</table>

 <?php 
 session_start(); 
if(isset($_POST['Search']))
{    if(empty($_POST['getlectid']))
  {
     echo '<script type="text/javascript">';
     echo ' alert("Required to fill up everything!")'; 
     echo '</script>';
  }else{
  $getlectid = $_POST['getlectid']; 
$delete = "SELECT lect_id,lect_name,lect_password,lect_contact_num,lect_email,lect_address,lect_position,lect_expertise,lect_faculty FROM lecturer where lect_id = '$getlectid' ";
$result = $db->query($delete);
echo"<table class=dlt width=95% border=1 cellspacing=0 cellpadding=10>";	
if ($result->num_rows > 0) {	
  $_SESSION['getlectid'] = $getlectid;
	echo"<tr>";
	echo"<th>Lect ID</th>";
	echo"<th>Name</th>";
	echo"<th>Password</th>";
    echo"<th>Phone Number</th>";
    echo"<th>Email</th>";
	echo"<th>Address</th>";
	echo"<th>Position</th>";
    echo"<th>Expertise</th>";
    echo"<th>Faculty</th>";
	echo"</tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo"<tr>";
	echo "<td>".$row["lect_id"]."</td>";
	echo "<td>".$row["lect_name"]."</td>";
	echo "<td>".$row["lect_password"]."</td>";
	echo "<td>".$row["lect_contact_num"]."</td>";
	echo "<td>".$row["lect_email"]."</td>";
	echo "<td >".$row["lect_address"]."</td>";  
  echo "<td>".$row["lect_position"]."</td>";
	echo "<td >".$row["lect_expertise"]."</td>";  
  echo "<td >".$row["lect_faculty"]."</td>";  
	echo"</tr>";	
  echo"</table>";
  echo "<input class='button'  type='submit' name='Delete' value='Delete'>";  
} }
else {
echo "0 results";
}}}

if(isset($_POST['Delete']))
{		
$sql = "DELETE FROM lecturer where lect_id  = '".$_SESSION['getlectid']."'";
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
</form>
</body>
</html>
