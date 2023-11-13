<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['e'];
    $sel = "SELECT * FROM as_banner WHERE ban_id='$id'";
    $Qy = mysqli_query($con, $sel);
    $info = mysqli_fetch_assoc($Qy);

    if(!empty($_POST)){
        $eid = $_POST['eid'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $button = $_POST['button'];
        $url = $_POST['url'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'banner-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        $update = "UPDATE as_banner SET ban_title='$title', ban_subtitle='$subtitle', ban_button='$button', ban_url='$url' WHERE ban_id='$eid'";

        if(mysqli_query($con, $update)){
            if($imageName!= ''){
                $upd = "UPDATE as_banner SET ban_image = '$imageName' WHERE ban_id = '$id'";
                mysqli_query($con, $upd);
                move_uploaded_file($image['tmp_name'], 'uploads/banner/'.$imageName);
                header('Location:all-banner.php');
            }
            header('Location: all-banner.php?v='. $eid);
        }else{
            header('Location: edit-banner.php?e='. $eid);
        }
    }
?>
<div class="col-md-12 main_banner">
    <form method="POST" enctype="multipart/form-data" action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Edit Banner</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-banner.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Banners</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Banner Title:</label> 
                    <div class="col-md-7">
                    <input type="hidden" name="eid" value="<?= $info['ban_id']; ?>" />
                    <input type="text" class="form-control" name="title" value="<?= $info['ban_title'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Banner Subtitle:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="subtitle" value="<?= $info['ban_subtitle'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Button:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="button" value="<?= $info['ban_button'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">URL:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="url" value="<?= $info['ban_url'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Image:</label> 
                    <div class="col-md-4">
                    <input type="file" class="form-control" name="pic" onchange="readURL(this);">
                    </div>   
                    <div class="col-md-3">
                    <?php if($info['ban_image'] != ''){ ?>
                        <img src="uploads/banner/<?= $info['ban_image'] ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
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