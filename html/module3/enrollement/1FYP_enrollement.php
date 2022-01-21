<?php
include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php' ;  
$StudId=$StudName=$fypStage= " "; 

if(isset($_POST['Enroll']))
{  
    if(empty( $_POST['StudId']) || empty($_POST['StudName']) || empty($_POST['fypStage']))
   {
      echo '<script type="text/javascript">';
      echo ' alert("Required to fill up everything!")'; 
      echo '</script>';
   }
  
  else{  
     $StudId = $_POST['StudId'];
     $StudName = $_POST['StudName'];
     $fypStage = $_POST['fypStage'];
     $sql = "INSERT INTO fyp_stud (stud_id,stud_name,fyp_stage)
     VALUES ('$StudId',' $StudName',' $fypStage')";

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
   <form action="" method="post" enctype="multipart/form-data" > 
      <h1>FYP Enrollement </h1>
    <table class="au">
   <tr>
<th>Student ID</th>
 <td><input type="text" name="StudId" class="form-control"><br></td></tr>
 
<tr>
 <th >Name</th>
 <td> <input type="text" name="StudName" class="form-control"><br></td></tr>
 
 
<tr>
 <th  >Final year project</th>
 <td><select name="fypStage" id="fypStage" class="form-control" >
<option value = "PSM1" >PSM1</option>
<option value = "PSM2" >PSM2</option></select><br></td></tr>
 
<tr>
<th >Upload Proposal</th>
  <td><input type="file" name="proposalDoc" id="proposalDoc">
  <input type="submit" value="Upload Image" name="submit"><br></td></tr>

  </table>
 <input class="button"type="submit"  name="Enroll" value="Enroll">
 </form>
</div>
</body>


</html>
