<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FYP </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<body>


      <div class="container">
          <div class="jumbotron">



              <div class="card">
                  <div class="card-body">





                    <h2 style="text-align:"> Student Marks </h2>

                    <?php
                        $connection = mysqli_connect("localhost", "root","");
                        $db= mysqli_select_db($connection, 'studfyp_db');

                        $query = "SELECT * FROM evaluation_result";
                        $query_run = mysqli_query($connection,$query);
                    ?>

                    <table class="table table-borderless table-dark">
                    <thead>
                    <tr>
                      <th scope="col">Result ID</th>
                      <th scope="col">project Title</th>
                      <th scope="col">submission level</th>
                      <th scope="col">evaluation feedback</th>
                      <th scope="col">evaluation mark</th>






                    </tr>
                  </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                  <tbody>
                    <tr>
                    >
                      <td><?php echo $row['result_id']; ?></td>
                      <td><?php echo $row['project_title']; ?></td>
                      <td ><?php echo $row['submission_level']; ?></td>
                      <td ><?php echo $row['evaluation_feedback']; ?></td>
                      <td ><?php echo $row['evaluation_mark']; ?></td>





                  </tbody>
            <?php
                    }
              }
              else
                 {
                  echo "No announcement found";
                 }
              ?>


                      </table>
                  </div>
              </div>


          </div>
      </div>





      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

      <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>





</body>
