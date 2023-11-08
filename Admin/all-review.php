<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();
?>
<div class="col-md-12 main_content">
    <form action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>All Review Info</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <?php if($_SESSION['role']==1){ ?>
                        <a href="add-review.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>Add Review</a>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover custom_table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Review</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    $sel = "SELECT * FROM as_review ORDER BY rev_id ASC LIMIT 0,4";
                    $Query = mysqli_query($con,$sel);
                    while($data = mysqli_fetch_assoc($Query)){
                    ?>
                        <tr>
                            <td><?php
                                $check = $i++;
                                if($check<10){
                                    echo "0". $check;
                                }else{
                                    echo $check;
                                }
                            ?></td>
                            <td><?= $data['rev_name']; ?></td>
                            <td><?= $data['rev_designation']; ?></td>
                            <td><?= substr($data['rev_text'], 0,40); ?>.....</td>
                            <td>
                                <?php if($data['rev_image'] != ''){ ?>
                                <img src="uploads/review/<?= $data['rev_image']; ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
                                <?php }else{ ?>
                                    <img src="images/avatar.png" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
                                <?php } ?>
                            </td>
                            <td>
                                <a href="view-review.php?v=<?php echo $data['rev_id']; ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                                <?php if($_SESSION['role']==1){ ?>
                                <a href="edit-review.php?e=<?= $data['rev_id'] ?>"><i class="fas fa-pen-square fa-lg"></i></a>
                                <a href="delete-review.php?d=<?= $data['rev_id'] ?>"><i class="fa fa-trash fa-lg"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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