<?php
include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php';

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../../css/module_1.css" type="text/css"/>  
</head>
<body>
<div class="container">
<form action="" method="post" >
<h1>Delete Student's Data </h1>
 <table class="au" margin-left="auto" margin-right="auto">
 <tr>
<th>Enter Student's ID: </th>
<td><input type="text" name="getstdid" class="form-control"><input type="submit" class="Search btn btn-primary" name="Search" value="Search"></td>
</tr> 
</table>

 <?php 
 session_start(); 
if(isset($_POST['Search']))
{    if(empty($_POST['getstdid']))
  {
     echo '<script type="text/javascript">';
     echo ' alert("Required to Student ID ! ")'; 
     echo '</script>';
  }else{

  $getstdid = $_POST['getstdid']; 
$view = "SELECT * FROM student where stud_id = '$getstdid' ";
$result = $db->query($view);
echo"<table class= dlt width=70% border=1 cellspacing=0 cellpadding=10>";	
if ($result->num_rows > 0) {	
	 $_SESSION['getstdid'] = $getstdid;
	echo"<tr>";
	echo"<th>Student ID</th>";
	echo"<th>Name</th>";
	echo"<th>Password</th>";
	echo"<th>Address</th>";
	echo"<th>Email</th>";
	echo"<th>Phone Number</th>";
    echo"<th>Faculty</th>";
	echo"<th>Evaluate Company</th>";
	echo"</tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo"<tr>";
	echo "<td>".$row["stud_id"]."</td>";
	echo "<td>".$row["stud_name"]."</td>";
	echo "<td>".$row["stud_password"]."</td>";
	echo "<td>".$row["stud_address"]."</td>";
	echo "<td>".$row["stud_email"]."</td>";
	echo "<td >".$row["stud_contact_num"]."</td>";  
    echo "<td>".$row["stud_faculty"]."</td>";
	echo "<td >".$row["stud_company_attached"]."</td>";  
	 echo"</tr>";	
	 echo"</table>";
	echo "<input class='button'  type='submit' name='Delete' value='Delete'>";  
  } }
  else {
  echo "0 results";
  }}}
  if(isset($_POST['Delete']))
  {		
$sql = "DELETE  FROM student where stud_id = '".$_SESSION['getstdid']."'";
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
