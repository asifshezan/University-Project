<?php 

require_once('functions/function.php');

$id = $_GET['d'];
$delet = "DELETE FROM as_quote WHERE quote_id='$id'";
if(mysqli_query($con,$delet)){
    header('Location:all-quote.php');
}else{
    echo "There is an error.";
}


?>