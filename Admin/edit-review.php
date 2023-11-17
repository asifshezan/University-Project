<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['e'];
    $sel = "SELECT * FROM as_review WHERE rev_id='$id'";
    $Qy = mysqli_query($con, $sel);
    $info = mysqli_fetch_assoc($Qy);

    if(!empty($_POST)){
        $eid = $_POST['eid'];
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $review = $_POST['review'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'review-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        $update = "UPDATE as_review SET rev_name='$name', rev_designation='$designation', rev_text='$review' WHERE rev_id='$eid'";

        if(mysqli_query($con, $update)){
            if($imageName!= ''){
                $upd = "UPDATE as_review SET rev_image = '$imageName' WHERE rev_id = '$id'";
                mysqli_query($con, $upd);
                move_uploaded_file($image['tmp_name'], 'uploads/review/'.$imageName);
                header('Location:all-review.php');
            }
            header('Location: all-review.php?v='. $eid);
        }else{
            header('Location: edit-review.php?e='. $eid);
        }
    }
?>
<div class="col-md-12 main_review">
    <form method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Edit Review</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-review.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Reviews</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Name:</label> 
                    <div class="col-md-7">
                    <input type="hidden" name="eid" value="<?= $info['rev_id']; ?>" />
                    <input type="text" class="form-control" name="name" value="<?= $info['rev_name'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Designation:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="designation" value="<?= $info['rev_designation'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Details:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="review" value="<?= $info['rev_text'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Image:</label> 
                    <div class="col-md-4">
                    <input type="file" class="form-control" name="pic" onchange="readURL(this);">
                    </div>   
                    <div class="col-md-3">
                    <?php if($info['rev_image'] != ''){ ?>
                        <img src="uploads/review/<?= $info['rev_image'] ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
                        <?php }else{ ?>
                            <img src="images/avatar.png" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
                            <?php } ?>
                    </div> 
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-md btn-primary submit_btn" type="submit">Update</button>
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