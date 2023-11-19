<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['v'];
    $selec = "SELECT * FROM as_quote NATURAL JOIN as_course_list WHERE quote_id='$id'";
    $Que = mysqli_query($con, $selec);
    $info = mysqli_fetch_assoc($Que);
?>
<div class="col-md-12 main_content">
    <form action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>View Quote Data</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-quote.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Quote</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered table-hover table-striped custom_view_table">
                                <tr>
                                    <td>First Name</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['quote_fname'] ?></td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['quote_lname']?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['quote_phone'] ?></td>
                                </tr>
                                <tr>
                                    <td>Message</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['quote_mess'] ?></td>
                                </tr>
                                <tr>
                                    <td>Course</td>
                                    <td class="dot">:</td>
                                    <td><?= $info['course_list_name'] ?></td>
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