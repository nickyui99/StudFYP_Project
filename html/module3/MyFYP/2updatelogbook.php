<?php
include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php';

?>
  
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../../css/module_3.css" />  
</head>
<body>
<div class="container">
<form action="" method="post">
<h1>Update LogBook </h1>
 <table class="form-group">
 <tr>
<th>Enter LogBook ID: </th>
 <td><input type="text" name="getlogbookid" class="form-control"><input type="submit" class="btn btn-primary" name="Search" value="Search"></td>
</tr> 
 </form>
 <?php 
 session_start(); 
if(isset($_POST['Search']))
{    if(empty($_POST['getlogbookid']))
  {
     echo '<script type="text/javascript">';
     echo ' alert("Required to fill up everything!")'; 
     echo '</script>';
  }else{
  $getlogbookid = $_POST['getlogbookid']; 
$view = "SELECT * FROM project_logbook where logbook_id = '$getlogbookid' ";
$result = $db->query($view);
if ($result->num_rows > 0) {	
	 $_SESSION['getlogbookid'] = $getlogbookid;
  // output data of each row
  while($row = $result->fetch_assoc()) {?> 
  <div class="container">
 <table class="form-group">
   <tr>
<th>LogBook ID</th>
  <td><input type="text" name="logbookid" disabled="disabled" value="<?php echo $row['logbook_id'] ?>"/><br></td></tr>
  <tr>
 <th >Date</th>
  <td><input type="text" name="logbookdate" value="<?php echo $row['logbook_date'] ?>" /><br></td></tr>
  <tr>
 <th  >Activity</th>
  <td><input type="text" name="logbookdetails" value="<?php echo $row['logbook_details'] ?>" /><br></td></tr>
  </table>
<td><input type="submit" class="button" name="Update" value="Update"><br></td></tr>
<?php
  } }
  else {
  echo "0 results";
  }}}
if(isset($_POST['Update']))
{  

     $logbookdate = $_POST['logbookdate'];
     $logbookdetails = $_POST['logbookdetails'];
     $update = "UPDATE project_logbook set logbook_date='$logbookdate',logbook_details=' $logbookdetails'
     WHERE logbook_id = '".$_SESSION['getlogbookid']."'";

     if (mysqli_query($db, $update)) {
      echo '<script type="text/javascript">';
      echo ' alert("Record has been updated successfully !")'; 
      echo '</script>';
     } else {
        echo "Error: " . $update . ":-" . mysqli_error($db);
     }
     mysqli_close($db);

}
?> 
 </div>
</body>
</html>
