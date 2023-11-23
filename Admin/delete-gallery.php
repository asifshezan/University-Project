<?php 
 require_once('functions/function.php');
 $id = $_GET['d'];
 $delet = "DELETE FROM as_gallery WHERE gallery_id = '$id'";
 if(mysqli_query($con, $delet)){
    header('Location:all-gallery.php');
 }else{
    echo "There is an error";
 }

?>