<?php
include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php' ;  
$logbookid=$logbookdate=$logbookdetails=$stdaddress=$stdemail=$stdhpnum=$stdfaculty=$logbookevcomp = " "; 
if(isset($_POST['Add']))
{  
    if(empty($_POST['logbookid'])|| empty( $_POST['logbookdate']) || empty($_POST['logbookdetails']) || empty($_POST['stdaddress']) || empty($_POST['stdemail']) || empty($_POST['stdhpnum']) || empty($_POST['stdfaculty'])||empty($_POST['stdevcomp']))
   {
      echo '<script type="text/javascript">';
      echo ' alert("Required to fill up everything!")'; 
      echo '</script>';
   }
  
  else{
  $logbookid = $_POST['logbookid'];  
     $logbookdate = $_POST['logbookdate'];
     $logbookdetails = $_POST['logbookdetails'];
     $stdaddress = $_POST['stdaddress'];
	  $stdemail = $_POST['stdemail'];
	  $stdhpnum = $_POST['stdhpnum'];
     $stdfaculty = $_POST['stdfaculty'];
     $stdevcomp = $_POST['stdevcomp'];
     $sql = "INSERT INTO project_logbook (logbook_id,logbook_date,logbook_details,stud_address,stud_email,stud_contact_num,stud_faculty,stud_company_attached)
     VALUES ('$logbookid','$logbookdate',' $logbookdetails',' $stdaddress','$stdemail','$stdhpnum','$stdfaculty','$stdevcomp')";
    // $user = "SELECT admin_name FROM admin";
    // $display = $db->query($user);
     if (mysqli_query($db, $sql)) {
      echo '<script type="text/javascript">';
      echo ' alert("New record has been added successfully !")'; 
      echo '</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($db);
     }
     mysqli_close($db);
   }
}
   ?>
<!DOCTYPE html>  
<html>
       <link rel="stylesheet" href="../../../css/module_1.css" />  
<body>
<div class="container">
   <form action="" method="post"> 
      <h1>Student Registration Form </h1>
    <table class="au">
   <tr>
<th>Student ID</th>
 <td><input type="text" name="logbookid" class="form-control"><br></td></tr>
 
<tr>
 <th >Name</th>
 <td> <input type="text" name="logbookdate" class="form-control"><br></td></tr>
 
<tr>
 <th  >Password</th>
 <td> <input type="text" name="logbookdetails" class="form-control"><br></td></tr>
 
 <tr>
 <th  >Address</th>
 <td> <input type="text" name="stdaddress" class="form-control"><br></td></tr>
 
 <tr>
 <th>Email</th>
 <td> <input type="email" name="stdemail" class="form-control"><br></td></tr>
 <tr>
 
 <th  >Phone Number</th>
 <td> <input type="text" name="stdhpnum" class="form-control"><br></td></tr>
 
<tr>
 <th  >Faculty</th>
 <td><select name="stdfaculty" id="stdfaculty" class="form-control" >
<option value = "FK" >FK</option>
<option value = "FIST" >FIST</option>
<option value = "FTEK" >FTEK</option>
<option value ="FKM" >FKM</option>
<option value = "FIM" >FIM</option>
<option value = "FTKA" >FTKA</option>
<option value = "FTKEE" >FTKEE</option></select><br></td></tr>
 
<tr>
 <th  >Evaluate Company</th>
 <td> <input type="text" name="stdevcomp" class="form-control"><br></td></tr>
 
  </table>
 <input class="button"type="submit"  name="Add" value="Add">
 </form>
</div>
</body>


</html>
