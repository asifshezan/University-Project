<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    $id = $_GET['e'];
    $sel = "SELECT * FROM as_user WHERE user_id='$id'";
    $Qy = mysqli_query($con, $sel);
    $info = mysqli_fetch_assoc($Qy);

    if(!empty($_POST)){
        $eid = $_POST['eid'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'user-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        $update = "UPDATE as_user SET user_name='$name', user_phone='$phone', user_email='$email', role_id='$role' WHERE user_id='$eid'";

        if(mysqli_query($con, $update)){
            if($imageName != ''){
                $upd = "UPDATE as_user SET user_photo='$imageName' WHERE user_id='$id'";
                mysqli_query($con, $upd);
                move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
                header('Location: view-user.php?v='. $eid);
            }
            header('Location: view-user.php?v='. $eid);
        }else{
            header('Location: edit-user.php?e='. $eid);
        }
    }
?>
<div class="col-md-12 main_content">
    <form method="POST" enctype="multipart/form-data" action="">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>Edit User</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="all-user.php" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-th"></i>All Users</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Name:</label> 
                    <div class="col-md-7">
                    <input type="hidden" name="eid" value="<?= $info['user_id']; ?>" />
                    <input type="text" class="form-control" name="name" value="<?= $info['user_name'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Phone:</label> 
                    <div class="col-md-7">
                    <input type="number" class="form-control" name="phone" value="<?= $info['user_phone'] ?>">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Email:</label>
                    <div class="col-md-7">
                        <input type="email" class="form-control" name="email" value="<?= $info['user_email'] ?>">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Username:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="user" value="<?= $info['user_username'] ?>" disabled>
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">User Role:</label> 
                    <div class="col-md-7">
                    <select type="text" class="form-control" name="role">
                    <?php 
                            $selr = "SELECT * FROM as_role ORDER BY role_id ASC";
                            $Qy = mysqli_query($con, $selr);
                            while( $urole = mysqli_fetch_assoc($Qy)){
                        ?>
                        <option value="<?= $urole['role_id'] ?> "<?php if($urole['role_id'] == $info['role_id']){ echo 'selected';} ?>><?= $urole['role_name'] ?></option>
                        <?php } ?>
                    </select>    
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Image:</label> 
                    <div class="col-md-4">
                    <input type="file" class="form-control" name="pic">
                    </div>   
                    <div class="col-md-3">
                    <?php if($info['user_photo'] != ''){ ?>
                        <img src="uploads/<?= $info['user_photo'] ?>" class="img-thumbnail" style="height: 50px; max-width: 80px;" alt="">
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