<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    if(!empty($_POST)){
        $teacher = $_POST['teacher'];
        $seat = $_POST['seat'];
        $duration = $_POST['duration'];
        $title = $_POST['title'];
        $details = $_POST['details'];
        $btn = $_POST['btn'];
        $url = $_POST['url'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'course-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        if(!empty($title)){
        $insert = "INSERT INTO as_course(course_teacher, course_seat, course_duration, course_title, course_details, course_btn, course_btn_url, course_banner)
        VALUES('$teacher', '$seat', '$duration', '$title', '$details', '$btn', '$url', '$imageName')";

        if(mysqli_query($con, $insert)){
            move_uploaded_file($image['tmp_name'],'uploads/course/'.$imageName);
            echo "Successfully upload the course.";
        }else{
            echo "Opps! There is an error.";
        }

        }else{
            echo "Please enter course title.";
        }
    }
?>

<div class="col-md-12 main_content">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Add Course Info.</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-course.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Course</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Teacher:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="teacher">
                    </div>   
                </div>
               
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Seat:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="seat">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Duration:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="duration">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Title:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="title">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Details:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="details">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Button:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="btn">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Button URL:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="url">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Course Banner:</label> 
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