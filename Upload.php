<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['add'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mail = mysqli_real_escape_string($conn,$_POST['mail']);
    $sub = mysqli_real_escape_string($conn,$_POST['sub']);
    $phone = mysqli_real_escape_string($conn,$_POST['Phone']);
    if(empty($name) || empty($mail) || empty($sub) || empty($phone) ){
        $msg = "Plz Fill all Fields";}
    else{ 
       
        $sql= "INSERT INTO `student`(`stname`,`stmail`,`stsub`,`stsub_id`,`stphone`) VALUES ('$name','$mail', '$subject','$sub','$phone')";
        $result= mysqli_query($conn, $sql);
       if($result){
          $message= "Data inserted Sucessfully";
     
         }
         else{
             $message= "Error inserting Data";
         }


    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Form</title>
    <style>
        .form-control {
            width: 400px;
        }
        .uploadicon {
            position: relative;
            top: 1em;
        }
        .btn {
            padding: 0.5em 2em;
        }
        .row1{
            display: flex;
            justify-content: space-around;
        }
        #subject{
            width: 400px
        }
        .file{
            margin-left:5em;
            margin-top:3em;

        }
       
        
        .head{
            margin-top:2em;
            margin-bottom:1em;
            margin-left:10em;
            font-size: 40px;

        }
       #submit{
        margin-left:5em;
        margin-top:2em;
       }
      
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark " >
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
    if(isset($message)){
    ?>  
<div class="alert alert-secondary" role="alert">
<?php
    echo @$message;
  
}
    ?>
    </div>
    <div class="container" >
        <h2 class="head">Register Yourself</h2>
        <form  method="POST" enctype="multipart/form-data">
            <div class="row1">
            <div class="mb-3">
                <label for="Fname" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="Sname" class="form-label">E-mail</label>
                <input type="email" name="mail" class="form-control" id="mail" required>
            </div>
    </div>
    <div class="row1">
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <select name="sub" class="form-select" id="subject" required>
                    <option value="1">Machine Learning</option>
                    <option value="3">Digital Image Processing</option>
                    <option value="2">Natural Language Processing</option>
                    <option value="4">Software Quality Assurance</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="Phone" class="form-label">Phone Number</label>
                <input type="number" name="Phone" class="form-control" id="Phone" required>
            </div></div>
           
            <div class="mb-3">
                <button type="submit" name="add" id="submit"class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
    

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

   