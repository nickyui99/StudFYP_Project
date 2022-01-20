<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
      <h1>Assign Student to supervisor</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Assigned Student </h4>
                    </div>
                    <div class="card-body">
                  <!------------------------ student search engin -------------------->
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-5">

                                    <input type="text" placeholder="Enter Student ID" name="ip_id" value="<?php if(isset($_GET['ip_id'])){echo $_GET['ip_id'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>


                          
                        </form>

                        <br>


<div class="row">
                            <div class="col-md-"17">

                                <?php
                                    $con = mysqli_connect("localhost","root","","studfyp_db");

                                    if(isset($_GET['ip_id']))
                                    {

                                        $ip_id = $_GET['ip_id'];
                                        $query = "SELECT * FROM industrial_panel WHERE ip_id='$ip_id' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                            <form>
                                <table class="table">
                                      <thead class="thead-dark">
                                      <tr>
                                      <th scope="col">industrial panel Id</th>
                                      <th scope="col">industrial panel name</th>
                                      <th scope="col">industrial panel Number</th>
                                      <th scope="col">industrial panel Email</th>
                                      <th scope="col">industrial panel Company</th>

                                       </tr>
                                     </thead>

                                      <tbody>
                                       <tr>
                                       <th scope="row"><input type="text" value="<?= $row['ip_id']; ?>" class="form-control"></th>
                                      <th scope="col"><input type="text" value="<?= $row['ip_name']; ?>" class="form-control"></th>

                                      <th scope="row"><input type="text" value="<?= $row['ip_contact_num']; ?>" class="form-control"></th>
                                     <th scope="col"><input type="text" value="<?= $row['ip_email']; ?>" class="form-control"></th>
                                     <th scope="col"><input type="text" value="<?= $row['ip_company']; ?>" class="form-control"></th>






                                          </form>
                                          </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }

                                ?>


                            </div>
