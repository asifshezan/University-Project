<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['v'];
    $selec = "SELECT * FROM as_course NATURAL JOIN as_course_list WHERE course_id='$id'";
    $Que = mysqli_query($con, $selec);
    $info = mysqli_fetch_assoc($Que);
?>
<div class="col-md-12 main_course">
    <form action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>View Course Data</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-course.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Course</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered table-hover table-striped custom_view_table">
                                <tr>
                                    <td>Title</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['course_title']; ?></td>
                                </tr>
                                <tr>
                                    <td>Details</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['course_details']; ?></td>
                                </tr>
                                <tr>
                                    <td>Button</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['course_btn']; ?></td>
                                </tr>
                                <tr>
                                    <td>URL</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['course_btn_url']; ?></td>
                                </tr>
                                <tr>
                                    <td>Duration</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['course_duration']; ?></td>
                                </tr>
                                <tr>
                                    <td>Seat</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['course_seat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Teacher</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['course_teacher']; ?></td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td class="dot">:</td>
                                    <td><?php if($info['course_banner'] != ''){ ?>
                                        <img src="uploads/course/<?= $info['course_banner'] ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
                                    <?php }else{ ?>
                                        <img src="images/avatar.png" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
                                    <?php }  ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                </div>
            </div>
            <div class="card-footer text-center">
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