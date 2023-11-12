<?php 
    require_once('functions/function.php');
    $id = $_GET['d'];
    $delt = "DELETE FROM as_content WHERE content_id = '$id'";
    if(mysqli_query($con, $delt)){
        header('Location: all-content.php');
    }else{
        echo "Opps! Delete operation failed.";
    }

?>
