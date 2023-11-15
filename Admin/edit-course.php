<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['e'];
    $sel = "SELECT * FROM as_course WHERE course_id='$id'";
    $Qy = mysqli_query($con, $sel);
    $info = mysqli_fetch_assoc($Qy);

    if(!empty($_POST)){
        $eid = $_POST['eid'];
        $title = $_POST['title'];
        $details = $_POST['details'];
        $btn = $_POST['button'];
        $url = $_POST['url'];
        $teacher = $_POST['teacher'];
        $seat = $_POST['seat'];
        $duration = $_POST['deration'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'course-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        $update = "UPDATE as_course SET course_title='$title', course_details='$details', course_btn='$btn',
         course_btn_url='$url', course_teacher='$teacher', course_seat='$seat', course_duration = '$duration' WHERE course_id='$eid'";

        if(mysqli_query($con, $update)){
            if($imageName!= ''){
                $upd = "UPDATE as_course SET course_banner = '$imageName' WHERE course_id = '$id'";
                mysqli_query($con, $upd);
                move_uploaded_file($image['tmp_name'], 'uploads/course/'.$imageName);
                header('Location:all-course.php');
            }
            header('Location: all-course.php?v='. $eid);
        }else{
            header('Location: edit-course.php?e='. $eid);
        }
    }
?>
<div class="col-md-12 main_course">
    <form method="POST" enctype="multipart/form-data" action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Edit Course</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-course.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Courses</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Title:</label> 
                    <div class="col-md-7">
                    <input type="hidden" name="eid" value="<?= $info['course_id']; ?>" />
                    <input type="text" class="form-control" name="title" value="<?= $info['course_title'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Details:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="details" value="<?= $info['course_details'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Button:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="button" value="<?= $info['course_btn'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">URL:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="url" value="<?= $info['course_btn_url'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Teacher:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="teacher" value="<?= $info['course_teacher'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Seat:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="seat" value="<?= $info['course_seat'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Duration:</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="deration" value="<?= $info['course_duration'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Image:</label> 
                    <div class="col-md-4">
                    <input type="file" class="form-control" name="pic" onchange="readURL(this);">
                    </div>   
                    <div class="col-md-3">
                    <?php if($info['course_banner'] != ''){ ?>
                        <img src="uploads/course/<?= $info['course_banner'] ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
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