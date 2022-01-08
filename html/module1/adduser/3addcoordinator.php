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
<h1>Coordinator Registration Form </h1>
 <table class="form-group">
 <tr>
<th style=text-align:right; >Enter Lecturer's ID: </th>
 <td><input type="text" name="getcorid" class="form-control"><input type="submit" class="btn btn-primary" name="Search" value="Search"></td>
</tr> 
 <table>
 </form>
 <?php 
 session_start(); 
if(isset($_POST['Search']))
{    if(empty($_POST['getcorid']))
  {
     echo '<script type="text/javascript">';
     echo ' alert("Required to fill up everything!")'; 
     echo '</script>';
  }else{
  $getcorid = $_POST['getcorid']; 
$view = "SELECT * FROM lecturer where lect_id = '$getcorid' ";
$result = $db->query($view);
echo"<table width=70% border=1 cellspacing=0 cellpadding=10>";	
if ($result->num_rows > 0) {	
	 $_SESSION['getcorid'] = $getcorid;
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
	  }?>
     <br> 
     <p>Incharge PSM Level : </p>  
<input type="checkbox" class="form-control"  id="psmlevel[]"  name="psmlevel[]" value="Sem 1"><label for="Sem 1">Sem 1</label><input type="checkbox"  name="psmlevel[]" value="Sem 2"><label for="Sem 2">Sem 2</label>    
<br> 
<input class="btn btn-primary"  type="submit" name="Assign" value="Assign"> 
<?php  
 }
  else {
  echo "0 results";
  }}}
  if(isset($_POST['Assign']))
  {	
$gopsm=implode(",", $_POST['psmlevel']);
$psm = " UPDATE fyp_coordinator SET coordinate_psm_level ='$gopsm' WHERE lect_id  = '".$_SESSION['getcorid']."'"; 
   if ($db->multi_query($psm) === TRUE){
   echo "Lecturer's information insert successfully" ;
} else {
echo "Error adding record: " . $db->error;
}
 $db->close();
} 
?> 
 </div>
</body>
</html>
