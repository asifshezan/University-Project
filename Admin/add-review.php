<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    if(!empty($_POST)){
        $name = $_POST['rname'];
        $designation = $_POST['rdesignation'];
        $text = $_POST['rtext'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'review-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        if(!empty($name)){
        $insert = "INSERT INTO as_review(rev_name, rev_designation, rev_text, rev_image)VALUES('$name', '$designation', '$text', '$imageName')";

        if(mysqli_query($con, $insert)){
            move_uploaded_file($image['tmp_name'],'uploads/review/'.$imageName);

            $_SESSION['status'] = "Successfully upload the review.";
            $_SESSION['status_code'] = "success";
        }else{
            $_SESSION['status'] = "Opps! There is an error.";
            $_SESSION['status_code'] = "error";
        }
        }else{
            $_SESSION['status'] = "Please enter review name.";
            $_SESSION['status_code'] = "warning";
        }
    }
?>

<div class="col-md-12 main_content">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Add Review Info.</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-review.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Review</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Review Name:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="rname">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Review Designation:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="rdesignation">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Review Details:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="rtext">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Review Image:</label> 
                    <div class="col-md-4">
                    <input type="file" class="form-control" name="pic" onchange="readURL(this);">
                    </div>  
                    <div class="col-md-3">
                    <img src="images/avatar.png" id="uploadPic" style="height: 60px; max-width: 80px;" alt="">
                    </div>   
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-md btn-primary submit_btn" type="submit">Upload</button>
            </div>
        </div>
    </form>
</div>

<?php
    get_footer();
}else{
    header('Location: index.php');
}
?>


<?php 
    if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
        ?>
        <script>
        Swal.fire({
        title: "<?php echo $_SESSION['status']; ?>",
        icon: "<?php echo $_SESSION['status_code']; ?>"
        });
        </script>
    
    <?php
        }else{
            ?>
    
        <script>
        Swal.fire({
        title: "<?php echo $_SESSION['status']; ?>",
        icon: "<?php echo $_SESSION['status_code']; ?>"
        });
        </script>
    
        <?php
    }

?>