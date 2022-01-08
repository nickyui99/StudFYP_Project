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
<h1>Update Coordinator's Data </h1>
 <table class="form-group">
 <tr>
<th style=text-align:right; >Enter Lecturer's ID: </th>
 <td><input type="text" name="getcoorid" class="form-control"><input type="submit" class="btn btn-primary" name="Search" value="Search"></td>
</tr> 
 </form>
 <?php 
 session_start(); 
if(isset($_POST['Search']))
{    if(empty($_POST['getcoorid']))
  {
     echo '<script type="text/javascript">';
     echo ' alert("Required to fill up everything!")'; 
     echo '</script>';
  }else{
  $getcoorid = $_POST['getcoorid']; 
$view = "SELECT * FROM fyp_coordinator where lect_id = '$getcoorid' ";
$result = $db->query($view);
if ($result->num_rows > 0) {	
	 $_SESSION['getcoorid'] = $getcoorid;
  // output data of each row
  while($row = $result->fetch_assoc()) {?> 
  <table class="form-group">
 <tr>
<th style=text-align:right; >Lecturer ID</th>
 <td><input type="text" name="lectid" class="form-control" disabled="disabled" value="<?php echo $row['lect_id'] ?>"/><br></td></tr>

<tr>
 <th style=text-align:right; >Name</th>
 <td> <input type="text" name="coorname" disabled="disabled" class="form-control"value="<?php echo $row['coordinator_name'] ?>" /><br></td></tr>
 
<tr>
 <th style=text-align:right; >Expertise</th>
 <td> <input type="text" name="lectexp" disabled="disabled" class="form-control"value="<?php echo $row['coordinator_expertise'] ?>" /><br></td></tr>
 
 <tr>
 <th  >Faculty</th>
 <td><input type="text" name="lectexp" disabled="disabled" class="form-control"value="<?php echo $row['coordinate_faculty'] ?>" /><br></td></tr>
<tr>
<th >PSM Level</th>
            <?php $psm=explode(",", $row['coordinate_psm_level'])?>
    <td><input type="checkbox" class="form-control"  name="psmlevel[]" value="Sem 1" <?php if(in_array("Sem 1",$psm)) echo "checked"; ?>><label for="Sem 1">Sem 1</label>
    <input type="checkbox"  name="psmlevel[]" value="Sem 2" <?php if(in_array("Sem 2",$psm)) echo "checked"; ?>><label for="Sem 2">Sem 2</label></td>    
  </tr>
<tr>
  </table>
<td><input type="submit" name="Update" class="button" value="Update"><br></td></tr>
<?php
  } }
  else {
  echo "0 results";
  }}}
if(isset($_POST['Update']))
    {	if( empty($_POST['psmlevel']))
        {
           echo '<script type="text/javascript">';
           echo ' alert("Cannot be empty! Procedd to delete coordinator if did not incharge any PSM")'; 
           echo '</script>';

        }else{
             $gopsm=implode(",", $_POST['psmlevel']);
  $update =  "UPDATE fyp_coordinator SET coordinate_psm_level ='$gopsm' WHERE lect_id  = '".$_SESSION['getcorid']."'"; 
     if (mysqli_query($db, $update)) {
      echo '<script type="text/javascript">';
      echo ' alert("Record has been updated successfully !")'; 
      echo '</script>';
        }
     else {
        echo "Error: " . $update . ":-" . mysqli_error($db);
     }
     mysqli_close($db);
}}
?> 
 </div>
</body>
</html>
