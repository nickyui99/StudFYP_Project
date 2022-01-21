<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="../../../css/module_2.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>View Student Progress</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-5">

                                    <input type="text" placeholder="Enter Student ID" name="stud_id" value="<?php if(isset($_GET['stud_id'])){echo $_GET['stud_id'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-"17">
                                <hr>
                                <?php
                                    $con = mysqli_connect("localhost","root","","studfyp_db");

                                    if(isset($_GET['stud_id']))
                                    {
                                        $stud_id = $_GET['stud_id'];

                                        $query = "SELECT * FROM fyp_project WHERE stud_id='$stud_id' ";
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
                                      <th scope="col">Student Id</th>
                                      <th scope="col">Project Title</th>
                                       <th scope="col">FYP stage</th>
                                       <th scope="col">FYP progect project</th>



                                       </tr>
                                     </thead>

                                      <tbody>
                                       <tr>
                                       <th scope="row"><input type="text" value="<?= $row['fyp_proj_id']; ?>" class="form-control"></th>
                                      <th scope="col"><input type="text" value="<?= $row['proj_title']; ?>" class="form-control"></th>
                                       <th scope="col"><input type="text" value="<?= $row['proj_fyp_stage']; ?>" class="form-control"></th>
                                       <th scope="col"><input type="text" value="<?= $row['fyp_proj_progress']; ?>" class="form-control"></th>

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
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
