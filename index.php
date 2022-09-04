<!doctype html>


<?php
    include('dbcon.php');
    session_start();
?>



<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP CRUD PDO</title>
  </head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">




                <?php
                    if(isset($_SESSION['message'])) :
                ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php
                    unset($_SESSION['message']);
                    endif;
                ?>




                <div class="card">
                    <div class="card-hearder">
                        <h3>PHP PDO CRUD</h3>
                        <a href="student-add.php" class="btn btn-primary float-end"> Add Student</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>iD</th>
                                    <th>FULL NAME</th>
                                    <th>EMAIL</th>
                                    <th>PHONE</th>
                                    <th>COURSE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM students";
                                    $statement = $conn->prepare($query);
                                    $statement->execute();

                                    $result = $statement->fetchAll(PDO::FETCH_OBJ);

                                    if($result)
                                    {
                                        foreach($result as $row)
                                        {
                                            ?>
                                                <tr>
                                                    <td><?= $row->id; ?></td>
                                                    <td><?= $row->fullname; ?></td>
                                                    <td><?= $row->email; ?></td>
                                                    <td><?= $row->phone; ?></td>
                                                    <td><?= $row->course; ?></td>
                                                    <td>
                                                        <a href="student-edit.php ?id=<?= $row->id; ?>" class="btn btn-warning">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="code.php" method="post">
                                                            <button type="submit" name="delete_student" class="btn btn-danger" value="<?= $row->id; ?>">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>                                                
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="5">No Record Found !</td>
                                            </tr>
                                        <?php

                                    }
                                ?>
                                <tr>
                                    <td></td> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>