<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']== 1 || $_SESSION['role']== 2 ){
    get_header();
    get_sidebar();

    $id = $_GET['e'];
    $sel = "SELECT * FROM as_gallery WHERE gallery_id='$id'";
    $Qy = mysqli_query($con, $sel);
    $info = mysqli_fetch_assoc($Qy);

    if(!empty($_POST)){
        $eid = $_POST['eid'];
        $url = $_POST['gallery_url'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'gallery-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        $update = "UPDATE as_gallery SET gallery_url='$url' WHERE gallery_id='$eid'";

        if(mysqli_query($con, $update)){
            if($imageName!= ''){
                $upd = "UPDATE as_gallery SET gallery_image = '$imageName' WHERE gallery_id = '$id'";
                mysqli_query($con, $upd);
                move_uploaded_file($image['tmp_name'], 'uploads/gallery/'.$imageName);
                header('Location:all-gallery.php');
            }
            header('Location: all-gallery.php?v='. $eid);
        }else{
            header('Location: edit-gallery.php?e='. $eid);
        }
    }
?>
<div class="col-md-12 main_gallery">
    <form method="POST" enctype="multipart/form-data" action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Edit Gallery</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-gallery.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Gallerys</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row custom_form_group">
                <input type="hidden" name="eid" value="<?= $info['gallery_id']; ?>" />
                    <label for="" class="col-md-3 col-sm-3 col-form-label">URL:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="gallery_url" value="<?= $info['gallery_url'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Image:</label> 
                    <div class="col-md-4">
                    <input type="file" class="form-control" name="pic" onchange="readURL(this);">
                    </div>   
                    <div class="col-md-3">
                    <?php if($info['gallery_image'] != ''){ ?>
                    <img src="uploads/gallery/<?= $info['gallery_image'] ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
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