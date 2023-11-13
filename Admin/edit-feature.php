<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['e'];
    $sel = "SELECT * FROM as_feature WHERE feat_id = '$id'";
    $Qy = mysqli_query($con, $sel);
    $info = mysqli_fetch_assoc($Qy);

    if(!empty($_POST)){
        $eid = $_POST['eid'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $icon = $_POST['icon'];
        $bg = $_POST['bg'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'feature-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        $update = "UPDATE as_feature SET feat_title='$title', feat_subtitle='$subtitle', feat_icon='$icon', feat_bg='$bg' WHERE feat_id='$eid'";

        if(mysqli_query($con, $update)){
            header('Location: all-feature.php?v='. $eid);
        }else{
            header('Location: edit-feature.php?e='. $eid);
        }
    }
?>
<div class="col-md-12 main_feature">
    <form method="POST" enctype="multipart/form-data" action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Edit Feature</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-feature.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Features</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row custom_form_group">
                        <label for="" class="col-md-3 col-sm-3 col-form-label">Feature Title:</label> 
                        <div class="col-md-7">
                        <input type="hidden" name="eid" value="<?= $info['feat_id']; ?>" />
                        <input type="text" class="form-control" name="title" value="<?= $info['feat_title'] ?>">
                        </div>   
                    </div>
                    <div class="form-group row custom_form_group">
                        <label for="" class="col-md-3 col-sm-3 col-form-label">Feature Subtitle:</label> 
                        <div class="col-md-7">
                        <input type="text" class="form-control" name="subtitle" value="<?= $info['feat_subtitle'] ?>">
                        </div>   
                    </div>
                    <div class="form-group row custom_form_group">
                        <label for="" class="col-md-3 col-sm-3 col-form-label">Icon:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="icon" value="<?= $info['feat_icon'] ?>">
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label for="" class="col-md-3 col-sm-3 col-form-label">Background:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="bg" value="<?= $info['feat_bg'] ?>">
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