<?php
    require_once('functions/function.php');
    needLogged();
    if($_SESSION['role']==1 || $_SESSION['role']==2 ){
    get_header();
    get_sidebar();

    if(!empty($_POST)){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pw = md5($_POST['pass']);
        $rpw = md5($_POST['cmpass']);
        $role = $_POST['role'];
        $image = $_FILES['pic'];
        $imageName = '';
        if($image['name']!=''){
        $imageName = 'user-'.time().'-'.rand(1590,5000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        }
        if(!empty($name)){
        if($pw === $rpw){
            if(!empty($role)){
        $insert = "INSERT INTO as_user(user_name, user_phone, user_email, user_username, user_password, role_id, user_photo)VALUES('$name', '$phone', '$email', '$user', '$pw', '$role', '$imageName')";

        if(mysqli_query($con, $insert)){
            move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
            echo "Successfully insert the user";
        }else{
            echo "Opps! There is an error.";
        }
    }else{
        echo "Please select a role.";
    }
        }else{
            echo "Password didn't match.";
        }
        }else{
            echo "Please enter your name.";
        }
    }
?>

<div class="col-md-12 main_content">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>User Registration</h4>
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
                    <input type="text" class="form-control" name="name">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Phone:</label> 
                    <div class="col-md-7">
                    <input type="number" class="form-control" name="phone">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Email:</label>
                    <div class="col-md-7">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Username:</label> 
                    <div class="col-md-7">
                    <input type="text" class="form-control" name="user">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Password:</label> 
                    <div class="col-md-7">
                    <input type="password" class="form-control" name="pass">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Confirm Password:</label> 
                    <div class="col-md-7">
                    <input type="password" class="form-control" name="cmpass">
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">User Role:</label> 
                    <div class="col-md-7">
                    <select type="text" class="form-control" name="role">
                        <option value="0">Select a role</option>
                        <?php 
                            $selr = "SELECT * FROM as_role ORDER BY role_id ASC";
                            $Qy = mysqli_query($con, $selr);
                            while( $urole = mysqli_fetch_assoc($Qy)){
                        ?>
                        <option value="<?= $urole['role_id'] ?>"><?= $urole['role_name'] ?></option>
                        <?php } ?>
                    </select>    
                    </div>   
                </div>
                <div class="form-group row custom_form_group">
                    <label for="" class="col-md-3 col-sm-3 col-form-label">Image:</label> 
                    <div class="col-md-4">
                    <input type="file" class="form-control" name="pic" onchange="readURL(this);">
                    </div>  
                    <div class="col-md-3">
                    <img src="images/avatar.png" id="uploadPic" style="height: 60px; max-width: 80px;" alt="">
                    </div>   
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-md btn-primary submit_btn" type="submit">Registration</button>
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