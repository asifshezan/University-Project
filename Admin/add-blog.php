<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    if(!empty($_POST)){
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $button = $_POST['button'];
        $url = $_POST['url'];
        $role = $_POST['role'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'blog-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        if(!empty($title)){
            if(!empty($role)){
        $insert = "INSERT INTO as_blog(blog_title, blog_subtitle, blog_btn, blog_url, role_id, blog_image)VALUES('$title', '$subtitle', '$button', '$url', '$role', '$imageName')";

        if(mysqli_query($con, $insert)){
            move_uploaded_file($image['tmp_name'],'uploads/blog/'.$imageName);
            echo "Successfully insert the blog";
        }else{
            echo "Opps! There is an error.";
        }
    }else{
        echo "Please select a role.";
    }
        }else{
            echo "Please enter your title.";
        }
    }
?>

<div class="col-md-12 main_content">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Add Blog</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-blog.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Blogs</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Blog Title:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="title">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Blog Subtitle:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="subtitle">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Button:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="button">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">URL:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="url">
                    </div>   
                </div>
                
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label"> Creator:</label> 
                    <div class="col-md-7">
                    <select type="text" class="form-control" name="role">
                        <option value="0">Select a Role</option>
                        <?php 
                            $selr = "SELECT * FROM as_role ORDER BY role_id ASC";
                            $Qy = mysqli_query($con, $selr);
                            while( $urole = mysqli_fetch_assoc($Qy)){
                        ?>
                        <option value="<?= $urole['role_id'] ?>"><?= $urole['role_name'] ?></option>
                        <?php } ?>
                    </select>    
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Blog Image:</label> 
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