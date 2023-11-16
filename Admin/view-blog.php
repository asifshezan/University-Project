<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['v'];
    $selec = "SELECT * FROM as_blog NATURAL JOIN as_role WHERE blog_id='$id'";
    $Que = mysqli_query($con, $selec);
    $info = mysqli_fetch_assoc($Que);
?>
<div class="col-md-12 main_blog">
    <form action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>View Blog Data</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-blog.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Blog</a>
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
                                    <td><?= $info['blog_title']; ?></td>
                                </tr>
                                <tr>
                                    <td>SubTitle</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['blog_subtitle']; ?></td>
                                </tr>
                                <tr>
                                    <td>Button</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['blog_btn']; ?></td>
                                </tr>
                                <tr>
                                    <td>URL</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['blog_url']; ?></td>
                                </tr>
                                <tr>
                                    <td>Creator</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['role_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Background</td>
                                    <td class="dot">:</td>
                                    <td><?php if($info['blog_image'] != ''){ ?>
                                        <img src="uploads/blog/<?= $info['blog_image'] ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
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