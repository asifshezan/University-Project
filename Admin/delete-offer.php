<?php 
 require_once('functions/function.php');
 $id = $_GET['d'];
 $delet = "DELETE FROM as_offer WHERE offer_id = '$id'";
 if(mysqli_query($con, $delet)){
    header('Location:all-offer.php');
 }else{
    echo "There is an error";
 }

?>