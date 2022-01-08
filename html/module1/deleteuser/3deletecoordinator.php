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
<h1>Delete Coordinator's Data </h1>
 <table class="form-group">
 <tr>
<th style=text-align:right; >Enter Lecturer's ID: </th>
 <td><input type="text" name="getlectid" class="form-control"><input type="submit" class="btn btn-primary" name="Search" value="Search"></td>
</tr> 
 <table>
 </form>
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
$delete = "SELECT * FROM fyp_coordinator where lect_id = '$getlectid' ";
$result = $db->query($delete);
echo"<table width=70% border=1 cellspacing=0 cellpadding=10>";	
if ($result->num_rows > 0) {	
  $_SESSION['getlectid'] = $getlectid;
	echo"<tr>";
	echo"<th>Lect ID</th>";
	echo"<th>Name</th>";
	echo"<th>Faculty</th>";
    echo"<th>Assist PSM level </th>";
    echo"<th>Expertise</th>";
	echo"</tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo"<tr>";
	echo "<td>".$row["lect_id"]."</td>";
	echo "<td>".$row["coordinator_name"]."</td>";
	echo "<td>".$row["coordinate_faculty"]."</td>";
	echo "<td>".$row["coordinate_psm_level"]."</td>";
	echo "<td >".$row["coordinator_expertise"]."</td>";  
	echo"</tr>";	
  echo"</table>";
  echo "<input class='button'  type='submit' name='Delete' value='Delete'>";  
} }
else {
echo "0 results";
}}}

if(isset($_POST['Delete']))
{		
$sql = "DELETE FROM fyp_coordinator where lect_id  = '".$_SESSION['getlectid']."'";
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
