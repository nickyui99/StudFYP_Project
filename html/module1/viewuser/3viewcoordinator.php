<?php

include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php' ;  

$sql = "SELECT * FROM fyp_coordinator WHERE coordinate_psm_level !='NULL'";
$result = $db->query($sql);
echo"<div class='container'>" ; 
echo " <h1>Coordinator List </h1>"; 
echo"<form>" ; 
echo"<table margin=auto width=max-content border=1 cellspacing=0 cellpadding=10>";	
if ($result->num_rows > 0) {	
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