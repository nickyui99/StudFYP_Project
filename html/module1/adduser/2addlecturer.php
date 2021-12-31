
<?php
 
 include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php' ;  
 $lectid=$lectname= $lectpassword=$lecthpnum=$lectemail=$lectaddress=$lectposition=$lectexp=$lectfaculty= "" ; 
 if(isset($_POST['Add']))
 {   
    if(empty($_POST['lectid'])|| empty( $_POST['lectname']) || empty($_POST['lectpassword']) || empty($_POST['lecthpnum']) || empty($_POST['lectemail']) || empty($_POST['lectfaculty']))
   {
      echo '<script type="text/javascript">';
      echo ' alert("Required to fill up everything!")'; 
      echo '</script>';
   }

   else{
       $lectid = $_POST['lectid'];  
      $lectname = $_POST['lectname'];
      $lectpassword = $_POST['lectpassword'];
       $lecthpnum = $_POST['lecthpnum'];
      $lectemail = $_POST['lectemail'];
      $lectaddress = $_POST['lectaddress'];
      $lectposition = $_POST['lectposition'];
      $lectexp = $_POST['lectexp'];
   $lectfaculty=$_POST['lectfaculty']; 
      $sql = "INSERT INTO lecturer (lect_id,lect_name,lect_password,lect_contact_num,lect_email,lect_address,lect_position,lect_expertise,lect_faculty)
      VALUES ('$lectid','$lectname',' $lectpassword','$lecthpnum','$lectemail','$lectaddress','$lectposition','$lectexp', '$lectfaculty')";

      if (mysqli_query($db, $sql)) {
       echo '<script type="text/javascript">';
       echo ' alert("New record has been added successfully !")'; 
       echo '</script>';
      } else {
         echo "Error: " . $sql . ":-" . mysqli_error($db);
      }
      mysqli_close($db);
    }}
    ?>

<html>
<link rel="stylesheet" href="../../../css/module_1.css" />  
<body>
<div class="container">
 <form action="" method="post">
 <h1>Lecturer Registration Form </h1>
 <table class="form-group">
 <tr>
<th style=text-align:right; >Lecturer ID</th>
 <td><input type="text" name="lectid" class="form-control"><br></td></tr>

<tr>
 <th style=text-align:right; >Name</th>
 <td> <input type="text" name="lectname" class="form-control"><br></td></tr>
 
<tr>
 <th style=text-align:right; >Password</th>
 <td> <input type="text" name="lectpassword" class="form-control"><br></td></tr>

 <tr>
 <th style=text-align:right; >Email</th>
 <td> <input type="email" name="lectemail" class="form-control"><br></td></tr>
<tr>
<tr>
 <th style=text-align:right; >Address</th>
 <td> <input type="text" name="lectaddress" class="form-control"><br></td></tr>
<tr>
 <th style=text-align:right; >Position</th>
 <td><select name="lectposition" id="lectposition" class="form-control" >
<option value = "Professor" >Professor</option>
<option value = "Associate Professor" >Associate Professor</option>
<option value ="Senior Lecturer" >Senior Lecturer</option>
<option value = "Lecturer" >Lecturer</option></select><br></td></tr>
 
 <tr>
 <th style=text-align:right; >Phone Number</th>
 <td> <input type="text" name="lecthpnum" class="form-control"><br></td></tr>

<tr>
 <th style=text-align:right; >Expertise</th>
 <td> <input type="text" name="lectexp" class="form-control"><br></td></tr>
 
 <tr>
    <th style=text-align:right; >Faculty</th>
    <td><select name="lectfaculty" id="lectfaculty" class="form-control" >
   <option value = "FK" >FK</option>
   <option value = "FTEK" >FTEK</option>
   <option value = "FIST" >FIST</option>
   <option value ="FKM" >FKM</option>
   <option value = "FIM" >FIM</option>
   <option value = "FTKA" >FTKA</option>
   <option value = "FTKEE" >FTKEE</option></select><br></td></tr>
    
 </table>
 <input type="submit" class="button" name="Add" value="Add">
 </form>
 </div>
</body>
</html>
