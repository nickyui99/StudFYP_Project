<?php

include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php' ;  

$sql = "SELECT * FROM lecturer";
$result = $db->query($sql);
echo"<div class='container'>" ; 
echo " <h1>Lecturer List </h1>"; 
echo"<form>" ; 
echo"<table width=max-content border=1 cellspacing=0 cellpadding=10>";	
if ($result->num_rows > 0) {	
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
  }  
	  echo"</table>";
} else {
  echo "0 results";
}
$db->close();
echo"</form>"; 
echo"</div>"; 
?>
<!DOCTYPE html>  
<html>
       <link rel="stylesheet" href="../../../css/module_1.css" />  
</html>