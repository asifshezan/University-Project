<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['v'];
    $selec = "SELECT * FROM as_contact WHERE con_id='$id'";
    $Que = mysqli_query($con, $selec);
    $info = mysqli_fetch_assoc($Que);
?>
<div class="col-md-12 main_content">
    <form action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>View Contact Message</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-message.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Contact Message</a>
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
                                    <td><?= $info['con_name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['con_email']?></td>
                                </tr>
                                <tr>
                                    <td>Subject</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['con_subj'] ?></td>
                                </tr>
                                <tr>
                                    <td>Message</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['con_mess'] ?></td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['con_time'] ?></td>
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