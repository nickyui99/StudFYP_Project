<?php
include 'dbase.php'
if(isset($_POST['submit']))
$name = $_POST["name"];
$email = $_POST["email"];
$number= $_POST["number"];
$address= $_POST["address"];

$sql="update '

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Update</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
  <div class="form-group">
     <label>Name</label>
    <input type="text" class="form-control"  placeholder="Enter Your Name" name="name">
</div>
<div class="form-group">
     <label>Email</label>
    <input type="email" class="form-control"  placeholder="Enter Your Email" name="email">
</div>
<div class="form-group">
     <label>Number Phone</label>
    <input type="text" class="form-control"  placeholder="Enter Your Phone Number" name="number">
</div>
<div class="form-group">
     <label>Address</label>
    <input type="text" class="form-control"  placeholder="Enter Your Address" name="address">
</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>

    
  </body>
</html>