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
                        <h4 class="card_header_title"><i class="fab fa-gg-circle"></i>All Quote Messages</h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                <form class="form-inline">
                    </form><form class="form-inline" method="get" action="search-quote.php">
                    <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="" name="search" placeholder="search here">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">SEARCH</button>
                </form>
                </div>
            </div>
                <table class="table table-bordered table-striped table-hover custom_table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fast Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Message</th>
                            <th scope="col">Course</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    $sel = "SELECT * FROM as_quote NATURAL JOIN as_course_list ORDER BY quote_id ASC";
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
                            <td><?= $data['quote_fname']; ?></td>
                            <td><?= $data['quote_lname']; ?></td>
                            <td><?= $data['quote_phone']; ?></td>
                            <td><?= substr($data['quote_mess'],0,40); ?>.....</td>
                            <td><?= $data['course_list_name']; ?></td>
                            <td>
                                <a href="view-quote.php?v=<?php echo $data['quote_id']; ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                                <?php if($_SESSION['role']==1){ ?>
                                <a href="delete-quote.php?d=<?= $data['quote_id'] ?>"><i class="fa fa-trash fa-lg"></i></a>
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