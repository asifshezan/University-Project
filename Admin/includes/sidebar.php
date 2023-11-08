<section>

        <div class="container-fluid content_part_full">
            <div class="row">
                <div class="col-md-2 slider_part">
                    <div class="user_part">
                        <img src="images/avatar.png" alt="">
                        <h4><?= $_SESSION['name']; ?></h4>
                        <p><i class="fas fa-circle" style="color: #09ce30;"></i>Online</p>
                    </div>
                    <div class="menu">
                        <ul>
                        <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
                        <?php if($_SESSION['role']==1 || $_SESSION['role']==2 ){ ?>
                        <li><a href="all-user.php"><i class="fa fa-user-circle"></i> User</a></li>
                        <?php }?>
                        <li><a href="all-banner.php"><i class="fas fa-images"></i> Banner</a></li>
                        <li><a href="all-feature.php"><i class="fas fa-list-ul"></i> Feature</a></li>
                        <li><a href="all-offer.php"><i class="fas fa-gift"></i> Offer</a></li>
                        <li><a href="all-course.php"><i class="fas fa-calendar-alt"></i> Course</a></li>
                        <li><a href="all-teacher.php"><i class="fas fa-users"></i> Teachers</a></li>
                        <li><a href="all-blog.php"><i class="fas fa-blog"></i> Blog</a></li>
                        <li><a href="all-review.php"><i class="fas fa-comment-dots"></i> Review</a></li>
                        <li><a href="all-quote.php"><i class="fa fa-quote-left"></i> Quote Messages</a></li>
                        <li><a href="all-message.php"><i class="fa fa-comments"></i> Contact Messages</a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 content_part">
                    <div class="row custom_breadpart">
                        <div class="col-md-10 bread">
                            <ul>
                                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">