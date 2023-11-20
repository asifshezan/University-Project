<?php 
require_once('functions/function.php');
$id = $_GET['d'];

$delt = "DELETE FROM as_contact WHERE con_id = '$id'";
if(mysqli_query($con, $delt)){
    header('Location:all-message.php');
}else{
    echo "There is an error.";
}


?>