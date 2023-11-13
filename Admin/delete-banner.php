<?php 
    require_once('functions/function.php');

    $id = $_GET['d'];
    $del = "DELETE FROM as_banner WHERE ban_id = '$id'";
    if(mysqli_query($con, $del)){
        header('Location: all-banner.php');
    }else{
        echo "There is an error.";
    }

?>