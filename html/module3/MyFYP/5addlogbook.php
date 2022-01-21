<?php
include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php' ;  
$logbookid=$logbookdate=$logbookdetails = " "; 
if(isset($_POST['Add']))
{  
    if(empty($_POST['logbookid'])|| empty( $_POST['logbookdate']) || empty($_POST['logbookdetails']))
   {
      echo '<script type="text/javascript">';
      echo ' alert("Required to fill up everything!")'; 
      echo '</script>';
   }
  
  else{
  $logbookid = $_POST['logbookid'];  
     $logbookdate = $_POST['logbookdate'];
     $logbookdetails = $_POST['logbookdetails'];
     $sql = "INSERT INTO project_logbook (logbook_id,logbook_date,logbook_details)
     VALUES ('$logbookid','$logbookdate',' $logbookdetails')";

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
       <link rel="stylesheet" href="../../../css/module_3.css" />  
<body>
<div class="container">
   <form action="" method="post"> 
    <table class="au">
   <tr>
<th>LogBook ID</th>
 <td><input type="text" name="logbookid" class="form-control"></td></tr>
 
<tr>
 <th >Date</th>
 <td> <input type="text" name="logbookdate" class="form-control"></td></tr>
 
<tr>
 <th  >Activity</th>
 <td> <input type="text" name="logbookdetails" class="form-control"></td></tr>
  
  </table>
 <input class="button"type="submit"  name="Add" value="Add">
 </form>
</div>
</body>


</html>