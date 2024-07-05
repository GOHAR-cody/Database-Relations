<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Notes</title>
    <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .image-container img {
            width: 100px;
            height: 50px;
        }
        .head{
            margin-top:2em;
            margin-bottom:1em;
            margin-left:10em;
            font-size: 40px;

        }
        .button{
            display:flex;
            justify-content:space-evenly;
        }
        .btn{
            margin-left:5px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="upload.php">Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="view.php">View</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    include 'db.php';
    ?>
    <div class="container" style="padding-top:1em ;">
        <h2 style="margin-bottom:1em" class="head">Students Data</h2>
        <?php
        
        $query = "SELECT * FROM `student` s INNER JOIN `teacher` t ON s.sub_id=t.Id";
        $res = mysqli_query($conn, $query);

        if ($res) {
            ?>
            <table id="mytable" class="table">
                <thead>
                    <tr style="margin-top:1em">
                        <th scope="col">ID</th>
                        <th scope="col">Teacher Name</th>
                        <th scope="col">Teacher Mail</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Student Mail</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($ar = mysqli_fetch_assoc($res)) {
                        // echo "<pre>";
                        //     print_r($ar);
                        // echo "</pre>";
               
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $ar['Tname'] ?></td>
                            <td><?php echo $ar['Tmail'] ?></td>
                            <td><?php echo $ar['stname'] ?></td>
                            <td><?php echo $ar['stmail'] ?></td>
                            <td><?php echo $ar['stphone'] ?></td>         
                            <td><?php echo $ar['Tsub'] ?></td>
                            <td>
                        <div class="button">
                                <a class="btn btn-danger" href="delete.php?upid=<?php echo $ar['stid'] ?>">Delete</a>
                                <a class="btn btn-success" href="edit.php?upid=<?php echo $ar['stid'] ?>">Update</a>
                      </div>
                            </td>
                        </tr>
                        <?php
                        $i = $i + 1;
                    }
                
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            // Handle query execution failure, display an error message, or log the error.
            echo 'Error executing the query: ' . mysqli_error($conn);
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        let table = new DataTable('#mytable');
    </script>
</body>
</html>
