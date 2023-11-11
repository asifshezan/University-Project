<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['e'];
    $sel = "SELECT * FROM as_content NATURAL JOIN as_page WHERE content_id='$id'";
    $Qy = mysqli_query($con, $sel);
    $info = mysqli_fetch_assoc($Qy);

    if(!empty($_POST)){
        $eid = $_POST['eid'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $details = $_POST['details'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'content-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        $update = "UPDATE as_content SET content_title='$title', content_subtitle='$subtitle', content_details='$details' WHERE content_id='$eid'";

        if(mysqli_query($con, $update)){
            if($imageName!= ''){
                $upd = "UPDATE as_content SET content_image = '$imageName' WHERE content_id = '$id'";
                mysqli_query($con, $upd);
                move_uploaded_file($image['tmp_name'], 'uploads/'.$imageName);
                header('Location:all-content.php');
            }
            header('Location: all-content.php?v='. $eid);
        }else{
            header('Location: edit-content.php?e='. $eid);
        }
    }
?>
<div class="col-md-12 main_content">
    <form method="POST" enctype="multipart/form-data" action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Edit content</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-content.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All contents</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Page:</label> 
                    <div class="col-md-7">
                    <input type="hidden" name="eid" value="<?= $info['content_id']; ?>" />
                    <input type="text" class="form-control" name="title" value="<?= $info['page_title'] ?>" disabled>
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Content Title:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="title" value="<?= $info['content_title'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Content Subtitle:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="subtitle" value="<?= $info['content_subtitle'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Contet Details:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="details" value="<?= $info['content_details'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Image:</label> 
                    <div class="col-md-4">
                    <input type="file" class="form-control" name="pic" onchange="readURL(this);">
                    </div>   
                    <div class="col-md-3">
                    <?php if($info['content_image'] != ''){ ?>
                        <img src="uploads/<?= $info['content_image'] ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
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