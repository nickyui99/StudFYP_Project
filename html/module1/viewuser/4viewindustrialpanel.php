<?php

 include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php' ;  

$sql = "SELECT * FROM industrial_panel";
$result = $db->query($sql);
echo"<div class='container'>" ; 
echo " <h1>Industrial Panel List </h1>"; 
echo"<form>" ; 
echo"<table margin=auto width=max-content border=1 cellspacing=0 cellpadding=10>";	
if ($result->num_rows > 0) {	
	echo"<tr>";
	echo"<th>Industrial Panel ID</th>";
	echo"<th>Name</th>";
	echo"<th>Password</th>";
	echo"<th>Email</th>";
	echo"<th>Phone Number</th>";
	echo"<th>Company</th>";
	echo"</tr>";
	;
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