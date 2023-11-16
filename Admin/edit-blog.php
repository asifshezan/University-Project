<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['e'];
    $sel = "SELECT * FROM as_blog NATURAL JOIN as_role WHERE blog_id='$id'";
    $Qy = mysqli_query($con, $sel);
    $info = mysqli_fetch_assoc($Qy);

    if(!empty($_POST)){
        $eid = $_POST['eid'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $btn = $_POST['button'];
        $url = $_POST['url'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'blog-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        $update = "UPDATE as_blog SET blog_title='$title', blog_subtitle='$subtitle', blog_btn='$btn',
         blog_url='$url' WHERE blog_id='$eid'";

        if(mysqli_query($con, $update)){
            if($imageName!= ''){
                $upd = "UPDATE as_blog SET blog_image = '$imageName' WHERE blog_id = '$id'";
                mysqli_query($con, $upd);
                move_uploaded_file($image['tmp_name'], 'uploads/blog/'.$imageName);
                header('Location:all-blog.php');
            }
            header('Location: all-blog.php?v='. $eid);
        }else{
            header('Location: edit-blog.php?e='. $eid);
        }
    }
?>
<div class="col-md-12 main_blog">
    <form method="POST" enctype="multipart/form-data" action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Edit blog</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-blog.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All blogs</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Title:</label> 
                    <div class="col-md-7">
                    <input type="hidden" name="eid" value="<?= $info['blog_id']; ?>" />
                    <input type="text" class="form-control" name="title" value="<?= $info['blog_title'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Subtitle:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="subtitle" value="<?= $info['blog_subtitle'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Button:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="button" value="<?= $info['blog_btn'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">URL:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="url" value="<?= $info['blog_url'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Teacher:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="role" value="<?= $info['role_name'] ?>" Disabled>
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Image:</label> 
                    <div class="col-md-4">
                    <input type="file" class="form-control" name="pic" onchange="readURL(this);">
                    </div>   
                    <div class="col-md-3">
                    <?php if($info['blog_image'] != ''){ ?>
                        <img src="uploads/blog/<?= $info['blog_image'] ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
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