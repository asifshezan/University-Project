<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    if(!empty($_POST)){
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $icon = $_POST['icon'];
        $bg = $_POST['bg'];
        
        if(!empty($title)){
        $insert = "INSERT INTO as_feature(feat_title, feat_subtitle, feat_icon, feat_bg)VALUES('$title', '$subtitle', '$icon', '$bg')";

        if(mysqli_query($con, $insert)){
            echo "Successfully upload the feature.";
        }else{
            echo "Opps! There is an error.";
        }
        }else{
            echo "Please enter feature title.";
        }
    }
?>

<div class="col-md-12 main_content">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Add Feature Info.</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-feature.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Feature</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Feature Title:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="title">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Feature Subtitle:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="subtitle">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Feature Icon:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="icon">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Feature Background:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="bg">
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