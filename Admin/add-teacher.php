<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    if(!empty($_POST)){
        $name = $_POST['tname'];
        $designation = $_POST['tdesignation'];
        $details = $_POST['tdetails'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'teacher-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        if(!empty($name)){
        $insert = "INSERT INTO as_teacher(teacher_name, teacher_designation, teacher_details, teacher_image)VALUES('$name', '$designation', '$details', '$imageName')";

        if(mysqli_query($con, $insert)){
            move_uploaded_file($image['tmp_name'],'uploads/teacher/'.$imageName);
            echo "Successfully upload the teacher.";
        }else{
            echo "Opps! There is an error.";
        }

        }else{
            echo "Please enter teacher name.";
        }
    }
?>

<div class="col-md-12 main_content">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Add Teacher Info.</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-teacher.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Teacher</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Teacher Name:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="tname">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Teacher Designation:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="tdesignation">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Teacher Details:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="tdetails">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Teacher Image:</label> 
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