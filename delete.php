<?php

include 'db.php';
$id = $_GET['upid'];
$sql = "DELETE FROM `student` WHERE `stid` = '$id'";
if (mysqli_query($conn, $sql)) {   
$message= "Record deleted Successfully";
header("Location: view.php");
exit();     
    
} else {
$message= "Error  deleting the Record Successfully";
header("Location: view.php");
exit();     
}


?>