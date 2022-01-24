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

    <!-- Modal -->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST">

                    <div class="modal-body">



                        <div class="form-group">
                            <label> Title </label>
                            <input type="text" name="announcement_title"  id="announcement_title" class="form-control" placeholder="Write the title here">
                        </div>

                        <div class="form-group">
                            <label> Decription </label>
                            <input type="text" name="announcement_description"  id="announcement_description" class="form-control" placeholder="">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save announcement</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

<!--UPDATE-FORM Model---------------------->


    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Announcement  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">

                    <div class="modal-body">

                      <input type"hidden" name="update_id" id="update_id">
                        <div class="form-group">
                            <label> Title </label>
                            <input type="text" name="announcement_title" id="announcement_title" class="form-control" placeholder="Write the title here">
                        </div>

                        <div class="form-group">
                            <label> Decription </label>
                            <input type="text" name="announcement_description" id="announcement_description" class="form-control" >
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update announcement</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

<!--UPDATE---------------------->



    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2> Announcement </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                        Add Announcement
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">





                  <h2 style="text-align:"> Announcements list</h2>

                  <?php
                      $connection = mysqli_connect("localhost", "root","");
                      $db= mysqli_select_db($connection, 'studfyp_db');

                      $query = "SELECT * FROM announcement";
                      $query_run = mysqli_query($connection,$query);
                  ?>

                  <table class="table table-borderless table-dark">
                  <thead>
                  <tr>
                    <th scope="col"> ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th colspan="2" scope="col"> Update</th>
                    <th scope="col">Delete</th>



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
                    <td><?php echo $row['announcement_id']; ?></td>
                    <td><?php echo $row['announcement_title']; ?></td>
                    <td colspan="2" ><?php echo $row['announcement_description']; ?></td>
                    <td>
                           <button type="button" class="btn btn-success editbtn"> Update
                           </button>
                    </td>


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



    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#announcement_title').val(data[1]);
                $('#announcement_description').val(data[2]);

            });
        });
    </script>


</body>
</html>
