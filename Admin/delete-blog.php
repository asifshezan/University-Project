<?php 
 require_once('functions/function.php');
 $id = $_GET['d'];
 $delet = "DELETE FROM as_blog WHERE blog_id = '$id'";
 if(mysqli_query($con, $delet)){
    header('Location:all-blog.php');
 }else{
    echo "There is an error";
 }

?>