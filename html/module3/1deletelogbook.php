<?php
include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php';

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../../css/module_3.css" type="text/css"/>  
</head>
<body>
<div class="container">
<form action="" method="post" >
<h1>Delete LogBook </h1>
 <table class="au" margin-left="auto" margin-right="auto">
 <tr>
<th>Enter LogBook ID: </th>
<td><input type="text" name="getlogbookid" class="form-control"><input type="submit" class="Search btn btn-primary" name="Search" value="Search"></td>
</tr> 
</table>

 <?php 
 session_start(); 
if(isset($_POST['Search']))
{    if(empty($_POST['getlogbookid']))
  {
     echo '<script type="text/javascript">';
     echo ' alert("Required to LogBook ID ! ")'; 
     echo '</script>';
  }else{

  $getlogbookid = $_POST['getlogbookid']; 
$view = "SELECT * FROM project_logbook where logbook_id = '$getlogbookid' ";
$result = $db->query($view);
echo"<table class= dlt width=70% border=1 cellspacing=0 cellpadding=10>";	
if ($result->num_rows > 0) {	
	 $_SESSION['getlogbookid'] = $getlogbookid;
	echo"<tr>";
	echo"<th>Student ID</th>";
	echo"<th>Date</th>";
	echo"<th>Activity</th>";
	echo"</tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo"<tr>";
	echo "<td>".$row["logbook_id"]."</td>";
	echo "<td>".$row["logbook_date"]."</td>";
	echo "<td>".$row["logbook_details"]."</td>";
	 echo"</tr>";	
	 echo"</table>";
	echo "<input class='button'  type='submit' name='Delete' value='Delete'>";  
  } }
  else {
  echo "0 results";
  }}}
  if(isset($_POST['Delete']))
  {		
$sql = "DELETE  FROM project_logbook where logbook_id = '".$_SESSION['getlogbookid']."'";
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
 </form>
 </div>
</body>
</html>
