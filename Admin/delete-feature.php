<?php 
 require_once('functions/function.php');
 $id = $_GET['d'];
 $delet = "DELETE FROM as_feature WHERE feat_id = '$id'";
 if(mysqli_query($con, $delet)){
    header('Location:all-feature.php');
 }else{
    echo "There is an error";
 }

?>