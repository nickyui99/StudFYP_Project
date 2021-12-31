
<?php
 
 include_once 'C:\xampp\htdocs\StudFYP_Project\mySQLi\config.php' ;  
 $ipid= $ipname=$iphpnum=$ipcompname=$ippass=" "; 
 if(isset($_POST['Add']))
 {  if(empty($_POST['ipid']) || empty($_POST['ipcompname']) || empty($_POST['ipname']) || empty( $_POST['ippass']) || empty($_POST['iphpnum'])|| empty($_POST['ipemail']))
   {
      echo '<script type="text/javascript">';
      echo ' alert("Required to fill up everything!")'; 
      echo '</script>';
   }else{
     $ipid = $_POST['ipid'];  
      $ipcompname = $_POST['ipcompname'];
      $ipname = $_POST['ipname'];
      $ippass = $_POST['ippass'];
      $iphpnum = $_POST['iphpnum'];
      $ipemail = $_POST['ipemail'];
      $sql = "INSERT INTO industrial_panel (ip_id,ip_name, ip_contact_num,ip_company,ip_password,ip_email)
      VALUES ('$ipid',' $ipname','$iphpnum','$ipcompname','$ippass','$ipemail')";
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
 <h1>Industrial Panel Registration Form </h1>
 <table class="form-group">

 <tr>
<th style=text-align:right; >Industrial Panel ID</th>
 <td><input type="text" name="ipid" class="form-control"><br></td></tr>

<tr>
 <th style=text-align:right; >Company Name</th>
 <td> <input type="text" name="ipcompname" class="form-control"><br></td></tr>

<tr>
 <th style=text-align:right; >Person In Charge </th>
 <td><input type="text" name="ipname" class="form-control"><br></td></tr>
<tr>
 <th style=text-align:right; >Password</th>
 <td> <input type="text" name="ippass"  class="form-control"><br></td></tr>

 <tr>
 <th style=text-align:right; >Phone Number</th>
 <td> <input type="text" name="iphpnum" class="form-control"><br></td></tr>

 <tr>
 <th style=text-align:right; >Email</th>
 <td> <input type="text" name="ipemail" class="form-control"><br></td></tr>


 </table>
 <input type="submit" class="button" name="Add" value="Add">
 </form>
 </div>
</body>
</html>
