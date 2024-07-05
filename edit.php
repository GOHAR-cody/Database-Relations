<?php
include 'db.php';

$id = $_GET['upid'];
$sql = "SELECT * FROM `student` WHERE `stid`=$id";
$result = mysqli_query($conn, $sql);
$note = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_changes'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mail = mysqli_real_escape_string($conn,$_POST['mail']);
    $sub = mysqli_real_escape_string($conn,$_POST['sub']);
    $phone = mysqli_real_escape_string($conn,$_POST['Phone']);
    if(empty($name) || empty($mail) || empty($sub) || empty($phone) ){
        $msg = "Plz Fill all Fields";}
    else{ 
        
        $sql= "UPDATE `student` SET `stname`='$name', `stmail`='$mail',`sub_id`='$sub', `stphone`='$phone' WHERE `stid`='$id'"; 
        $result= mysqli_query($conn, $sql);
       if($result){
          $message= "Data inserted Sucessfully";
          header("Location: view.php");
          exit(); 
         }
         else{
             $message= "Error inserting Data";
             header("Location: view.php");
             exit(); 
         }


    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Lato', sans-serif;
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('pics/3139767.jpg') center/cover no-repeat fixed;
            z-index: -1;
        }

        .container {
            min-height: 200vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            margin-top: 80px;
            width: 330px;
        }
        
        .main {
            height: 500px;
            font-family: 'Lato', sans-serif;
            position: relative;
            padding: 20px;
        }
        
        .input_text {
            margin-top: 20px;
            position: relative;
            height: 45px;
            width: 100%;
            border-radius: 30px;
            padding: 5px 20px;
            font-size: 14px;
            background-color: #fafafa;
            border: 0;
            outline: 0;
        }
        
        .button {
            margin-top: 20px;
            margin-left: 90px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            height: 45px;
            width: 100px;
            border: none;
            background-color: black;
            border-radius: 30px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.5s;
        }

        .gen {
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="main">
                    <form method="POST" enctype="multipart/form-data">
                        <label>Full Name:</label> 
                        <input class="input_text" type="text" name="name" value="<?php echo $note['stname']; ?>"><br>
                        
                        <label>E-mail:</label>
                        <input class="input_text" name="mail" value="<?php echo $note['stmail']; ?>"><br>
                        
                        <label>Phone:</label>
                        <input class="input_text" name="Phone" value="<?php echo $note['stphone']; ?>"><br>
                        
                        <label>Subject</label>
                        <select name="sub" class="form-select input_text" id="Gender" required>
                            <option value="<?php echo $note['sub_id']; ?>"><?php echo "Select One"; ?></option>
                            <option value="1">Machine Learning</option>
                            <option value="3">Digital Image Processing</option>
                            <option value="2">Natural Language Processing</option>
                            <option value="4">Software Quality Assurance</option>
                        </select><br>
                        
                        
                        <input type="hidden" class="input_text" name="note_id" value="<?php echo $id; ?>">
                        <button class="button" type="submit" name="save_changes" value="Update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
