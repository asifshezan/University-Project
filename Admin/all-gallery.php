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
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>All Gallery Info</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <?php if($_SESSION['role']==1){ ?>
                        <a href="add-gallery.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>Add Gallery</a>
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
                            <th scope="col">URL</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    $sel = "SELECT * FROM as_gallery ORDER BY gallery_id ASC LIMIT 0,4";
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
                            <td><?= $data['gallery_url']; ?></td>
                            <td>
                                <?php if($data['gallery_image'] != ''){ ?>
                                <img src="uploads/gallery/<?= $data['gallery_image']; ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
                                <?php }else{ ?>
                                    <img src="images/avatar.png" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
                                <?php } ?>
                            </td>
                            <td>
                                <a href="view-gallery.php?v=<?php echo $data['gallery_id']; ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                                <?php if($_SESSION['role']==1){ ?>
                                <a href="edit-gallery.php?e=<?= $data['gallery_id'] ?>"><i class="fas fa-pen-square fa-lg"></i></a>
                                <a href="delete-gallery.php?d=<?= $data['gallery_id'] ?>"><i class="fa fa-trash fa-lg"></i></a>
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