<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['v'];
    $selec = "SELECT * FROM as_review WHERE rev_id='$id'";
    $Que = mysqli_query($con, $selec);
    $info = mysqli_fetch_assoc($Que);
?>
<div class="col-md-12 main_review">
    <form action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>View Review Data</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-review.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Review</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered table-hover table-striped custom_view_table">
                                <tr>
                                    <td>Name</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['rev_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Designation</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['rev_designation']; ?></td>
                                </tr>
                                <tr>
                                    <td>Review</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['rev_text']; ?></td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td class="dot">:</td>
                                    <td><?php if($info['rev_image'] != ''){ ?>
                                        <img src="uploads/review/<?= $info['rev_image'] ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
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