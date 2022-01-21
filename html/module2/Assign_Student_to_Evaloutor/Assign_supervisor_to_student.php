<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FYP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="container">

      <div class="row justify-content-center">
          <div class="col-md-10">

              <div class="card mt-5">
                  <div class="card-header text-center">
                      <h4>Assign Supervisor to Student </h4>
                  </div>
                  <div class="card-body">

<form method="post" action="SpuerConnect.php">

<lebel  class="form-lebel">Select Student Id :</lebel>

  <?php


  $mysqli = NEW MySQLi('localhost','root','','studfyp_db');

  $resultSet = $mysqli->query("SELECT stud_id FROM student");
  ?>

  <select class="form-control" name="stud_id">
    <?php
    while($rows = $resultSet->fetch_assoc())
    {

        $stud_id = $rows['stud_id'];
        echo "<option value='$stud_id'>$stud_id</option>";


    }
    ?>
  </select>

  <lebel for="stud_id"  class="form-lebel">Select Supervisor Id : </lebel>



    <?php


    $mysqli = NEW MySQLi('localhost','root','','studfyp_db');

    $resultSet = $mysqli->query("SELECT lect_id FROM lecturer");
    ?>

    <select class="form-control" name="lect_id">
      <?php
      while($rows = $resultSet->fetch_assoc())
      {

          $lect_id = $rows['lect_id'];
          echo "<option value='$lect_id'>$lect_id</option>";


      }
      ?>
    </select><br>

      <input class="btn btn-primary" type="submit" name="save_select" >





</form>


</body>
</html>
