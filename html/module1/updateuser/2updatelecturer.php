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
<h1>Update Lecturer's Data </h1>
 <table class="form-group">
 <tr>
<th style=text-align:right; >Enter Lecturer's ID: </th>
 <td><input type="text" name="getlectid" class="form-control"><input type="submit" class="btn btn-primary" name="Search" value="Search"></td>
</tr> 
 </form>
 <?php 
 session_start(); 
if(isset($_POST['Search']))
{    if(empty($_POST['getlectid']))
  {
     echo '<script type="text/javascript">';
     echo ' alert("Required to fill up everything!")'; 
     echo '</script>';
  }else{
  $getlectid = $_POST['getlectid']; 
$view = "SELECT * FROM lecturer where lect_id = '$getlectid' ";
$result = $db->query($view);
if ($result->num_rows > 0) {	
	 $_SESSION['getlectid'] = $getlectid;
  // output data of each row
  while($row = $result->fetch_assoc()) {?> 
  <table class="form-group">
 <tr>
<th style=text-align:right; >Lecturer ID</th>
 <td><input type="text" name="lectid" class="form-control" disabled="disabled" value="<?php echo $row['lect_id'] ?>"/><br></td></tr>

<tr>
 <th style=text-align:right; >Name</th>
 <td> <input type="text" name="lectname" class="form-control"value="<?php echo $row['lect_name'] ?>" /><br></td></tr>
 
<tr>
 <th style=text-align:right; >Password</th>
 <td> <input type="text" name="lectpassword" class="form-control"value="<?php echo $row['lect_password'] ?>" /><br></td></tr>

 <tr>
 <th style=text-align:right; >Email</th>
 <td> <input type="email" name="lectemail" class="form-control"value="<?php echo $row['lect_email'] ?>" /><br></td></tr>
<tr>
<tr>
 <th style=text-align:right; >Address</th>
 <td> <input type="text" name="lectaddress" class="form-control" value="<?php echo $row['lect_address'] ?>" /><br></td></tr>
<tr>
 <th style=text-align:right; >Position</th>
 <td><select name="lectposition" id="lectposition" class="form-control" >
<option value = "Professor" <?php if ($row['lect_position'] == 'Professor') { echo 'selected="selected"';}?>>Professor</option>
<option value = "Associate Professor"<?php if ($row['lect_position'] == ' Assoiciate Professor') { echo 'selected="selected"';}?> >Associate Professor</option>
<option value ="Senior Lecturer" <?php if ($row['lect_position'] == 'Senior Lecturer') { echo 'selected="selected"';}?>>Senior Lecturer</option>
<option value = "Lecturer" <?php if ($row['lect_position'] == 'Lecturer') { echo 'selected="selected"';}?>>Lecturer</option></select><br></td></tr>
 
 <tr>
 <th style=text-align:right; >Phone Number</th>
 <td> <input type="text" name="lecthpnum" class="form-control"value="<?php echo $row['lect_contact_num'] ?>" /><br></td></tr>

<tr>
 <th style=text-align:right; >Expertise</th>
 <td> <input type="text" name="lectexp" class="form-control"value="<?php echo $row['lect_expertise'] ?>" /><br></td></tr>
 
 <tr>
 <th  >Faculty</th>
 <td><select name="lectfaculty" id="lectfaculty">
<option value="FK" <?php if ($row['lect_faculty'] == 'FK') { echo 'selected="selected"';}?>>FK</option>
<option value="FTEK" <?php if ($row['lect_faculty'] == 'FTEK') { echo 'selected="selected"';}?>>FTEK</option>
<option value="FTKKP" <?php if ($row['lect_faculty'] == 'FTKKP') { echo 'selected="selected"';}?>>FTKKP</option>
<option value="FIM" <?php if ($row['lect_faculty'] == 'FIM') { echo 'selected="selected"';}?>>FIM</option>
<option value="FTKA" <?php if ($row['lect_faculty'] == 'FTKA') { echo 'selected="selected"';}?>>FTKA</option>
<option value="FTKEE" <?php if ($row['lect_faculty'] == 'FTKEE') { echo 'selected="selected"';}?>>FTKEE</option>
</select><br></td></tr>
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

  $lectname = $_POST['lectname'];
  $lectpassword = $_POST['lectpassword'];
   $lecthpnum = $_POST['lecthpnum'];
  $lectemail = $_POST['lectemail'];
  $lectaddress = $_POST['lectaddress'];
  $lectposition = $_POST['lectposition'];
  $lectexp = $_POST['lectexp'];
  $lectfaculty=$_POST['lectfaculty']; 
  $update = "UPDATE lecturer SET lect_name='$lectname' , lect_password=' $lectpassword' ,lect_contact_num= '$lecthpnum',lect_email= '$lectemail',lect_address= '$lectaddress',
     lect_position= '$lectposition',lect_expertise='$lectexp' ,lect_faculty= '$lectfaculty'  WHERE  lect_id  = '".$_SESSION['getlectid']."'";
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
