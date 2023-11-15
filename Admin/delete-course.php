<?php 
 require_once('functions/function.php');
 $id = $_GET['d'];
 $delet = "DELETE FROM as_course WHERE course_id = '$id'";
 if(mysqli_query($con, $delet)){
    header('Location:all-course.php');
 }else{
    echo "There is an error";
 }

?>