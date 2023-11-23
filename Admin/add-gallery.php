<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    if(!empty($_POST)){
        $url = $_POST['gallery_url'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'gallery-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        if(!empty($image)){
        $insert = "INSERT INTO as_gallery(gallery_url, gallery_image)VALUES('$url','$imageName')";

        if(mysqli_query($con, $insert)){
            move_uploaded_file($image['tmp_name'],'uploads/gallery/'.$imageName);

            $_SESSION['status'] = "Successfully upload the gallery.";
            $_SESSION['status_code'] = 'success';
        }else{
            
            $_SESSION['status'] = "Opps! There is an error.";
            $_SESSION['status_code'] = 'error';
        }

        }else{
            $_SESSION['status'] = "Opps! Please upload the image.";
            $_SESSION['status_code'] = 'error';
        }
    }
?>

<div class="col-md-12 main_content">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Add Gallery Info.</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-gallery.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Gallery</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Gallery URL:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="gallery_url">
                    </div>   
                </div>
               
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Gallery Image:</label> 
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
    if(isset($_SESSION['status']) && $_SESSION['status'] != '' ){
        ?>
    <script>
        Swal.fire({
        title: "<?php echo $_SESSION['status']; ?>",
        icon: "<?php echo $_SESSION['status_code']; ?>"
        });
    </script>

    <?php
    } else{
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