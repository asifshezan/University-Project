<?php 
 require_once('functions/function.php');
 $id = $_GET['d'];
 $delet = "DELETE FROM as_teacher WHERE teacher_id = '$id'";
 if(mysqli_query($con, $delet)){
    header('Location:all-teacher.php');
 }else{
    echo "There is an error";
 }

?>