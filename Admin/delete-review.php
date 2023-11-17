<?php 
 require_once('functions/function.php');
 $id = $_GET['d'];
 $delet = "DELETE FROM as_review WHERE rev_id = '$id'";
 if(mysqli_query($con, $delet)){
    header('Location:all-review.php');
 }else{
    echo "There is an error";
 }

?>