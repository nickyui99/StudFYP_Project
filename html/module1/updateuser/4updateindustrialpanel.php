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
<h1>Update Industrial Panel's Data </h1>
 <table class="form-group">
 <tr>
<th>Enter Industrial Panel's ID: </th>
 <td><input type="text" name="getipid" class="form-control"><input type="submit" class="btn btn-primary" name="Search" value="Search"></td>
</tr> 
 </form>
 <?php 
 session_start(); 
if(isset($_POST['Search']))
{    if(empty($_POST['getipid']))
  {
     echo '<script type="text/javascript">';
     echo ' alert("Required to fill up everything!")'; 
     echo '</script>';
  }else{
  $getipid = $_POST['getipid']; 
$view = "SELECT * FROM industrial_panel where ip_id = '$getipid' ";
$result = $db->query($view);
if ($result->num_rows > 0) {	
	 $_SESSION['getipid'] = $getipid;
  // output data of each row
  while($row = $result->fetch_assoc()) {?> 
  <div class="container">
 <table class="form-group">
   <tr>
<th>Student ID</th>
  <td><input type="text" name="ipid" disabled="disabled" value="<?php echo $row['ip_id'] ?>"/><br></td></tr>
  <tr>
 <th >Name</th>
  <td><input type="text" name="ipname" value="<?php echo $row['ip_name'] ?>" /><br></td></tr>
  <tr>
 <th  >Password</th>
  <td><input type="text" name="ippass" value="<?php echo $row['ip_password'] ?>" /><br></td></tr>
   <tr>
 <th>Email</th>
  <td><input type="text" name="ipemail" value="<?php echo $row['ip_email'] ?>" /><br></td></tr>
  <tr>
<th  >Phone Number</th>
  <td><input type="text" name="iphpnum" value="<?php echo $row['ip_contact_num'] ?>" /><br></td></tr>
  
<tr>
 <th >Company</th>
<td><input type="text" name="ipcomp" value="<?php echo $row['ip_company'] ?>" /><br></td></tr>
<tr>
  </table>
<td><input type="submit" name="Update" class="button" value="Update"><br></td></tr>
<?php
  } }
  else {
  echo "0 results";
  }}}
if(isset($_POST['Update']))
{  

    $ipcomp = $_POST['ipcomp'];
    $ipname = $_POST['ipname'];
    $ippass = $_POST['ippass'];
    $iphpnum = $_POST['iphpnum'];
    $ipemail = $_POST['ipemail'];
     $update = "UPDATE industrial_panel set ip_name='$ipname',ip_password=' $ippass', ip_email='$ipemail', ip_contact_num='$iphpnum',ip_company='$ipcomp'
     WHERE ip_id = '".$_SESSION['getipid']."'";

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
