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
<h1>Update Student's Data </h1>
 <table class="form-group">
 <tr>
<th>Enter Student's ID: </th>
 <td><input type="text" name="getstdid" class="form-control"><input type="submit" class="btn btn-primary" name="Search" value="Search"></td>
</tr> 
 </form>
 <?php 
 session_start(); 
if(isset($_POST['Search']))
{    if(empty($_POST['getstdid']))
  {
     echo '<script type="text/javascript">';
     echo ' alert("Required to fill up everything!")'; 
     echo '</script>';
  }else{
  $getstdid = $_POST['getstdid']; 
$view = "SELECT * FROM student where stud_id = '$getstdid' ";
$result = $db->query($view);
if ($result->num_rows > 0) {	
	 $_SESSION['getstdid'] = $getstdid;
  // output data of each row
  while($row = $result->fetch_assoc()) {?> 
  <div class="container">
 <table class="form-group">
   <tr>
<th>Student ID</th>
  <td><input type="text" name="stdid" disabled="disabled" value="<?php echo $row['stud_id'] ?>"/><br></td></tr>
  <tr>
 <th >Name</th>
  <td><input type="text" name="stdname" value="<?php echo $row['stud_name'] ?>" /><br></td></tr>
  <tr>
 <th  >Password</th>
  <td><input type="text" name="stdpass" value="<?php echo $row['stud_password'] ?>" /><br></td></tr>
  <tr>
 <th>Address</th>
  <td><input type="text" name="stdaddress" value="<?php echo $row['stud_address'] ?>" /><br></td></tr>
  <tr>
 <th>Email</th>
  <td><input type="text" name="stdemail" value="<?php echo $row['stud_email'] ?>" /><br></td></tr>
  <tr>
<th  >Phone Number</th>
  <td><input type="text" name="stdhpnum" value="<?php echo $row['stud_contact_num'] ?>" /><br></td></tr>
  <tr>
 <th  >Faculty</th>
 <td><select name="stdfaculty" id="stdfaculty">
<option value="FK" <?php if ($row['stud_faculty'] == 'FK') { echo 'selected="selected"';}?>>FK</option>
<option value="FTEK" <?php if ($row['stud_faculty'] == 'FTEK') { echo 'selected="selected"';}?>>FTEK</option>
<option value="FTKKP" <?php if ($row['stud_faculty'] == 'FTKKP') { echo 'selected="selected"';}?>>FTKKP</option>
<option value="FIM" <?php if ($row['stud_faculty'] == 'FIM') { echo 'selected="selected"';}?>>FIM</option>
<option value="FTKA" <?php if ($row['stud_faculty'] == 'FTKA') { echo 'selected="selected"';}?>>FTKA</option>
<option value="FTKEE" <?php if ($row['stud_faculty'] == 'FTKEE') { echo 'selected="selected"';}?>>FTKEE</option>
</select><br></td></tr>
<tr>
 <th  >Evaluate Company</th>
<td><input type="text" name="stdevcomp" value="<?php echo $row['stud_company_attached'] ?>" /><br></td></tr>
<tr>
  </table>
<td><input type="submit" class="button" name="Update" value="Update"><br></td></tr>
<?php
  } }
  else {
  echo "0 results";
  }}}
if(isset($_POST['Update']))
{  

     $stdname = $_POST['stdname'];
     $stdpassword = $_POST['stdpass'];
     $stdaddress = $_POST['stdaddress'];
	  $stdemail = $_POST['stdemail'];
	  $stdhpnum = $_POST['stdhpnum'];
     $stdfaculty = $_POST['stdfaculty'];
     $stdevcomp = $_POST['stdevcomp'];
     $update = "UPDATE student set stud_name='$stdname',stud_password=' $stdpassword',stud_address=' $stdaddress', stud_email='$stdemail', stud_contact_num='$stdhpnum',stud_faculty='$stdfaculty',stud_company_attached='$stdevcomp'
     WHERE stud_id = '".$_SESSION['getstdid']."'";

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
