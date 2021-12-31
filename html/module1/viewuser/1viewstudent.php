<?php

include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php' ;  

$sql = "SELECT * FROM student";
$result = $db->query($sql);
echo"<div class='container'>" ; 
echo " <h1>Student List </h1>"; 
echo"<form>" ; 
echo"<table class = 'dl' width=max-content border=1 cellspacing=0 cellpadding=10>";	
if ($result->num_rows > 0) {	
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