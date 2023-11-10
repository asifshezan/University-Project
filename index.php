<?php
 require_once('functions/manage.php');
  get_header();
 ?> 
 <section class="home-slider owl-carousel">
  <?php 
    $selet = "SELECT * FROM as_banner ORDER BY ban_id ASC";
    $que = mysqli_query($con, $selet);
    while( $data = mysqli_fetch_assoc($que)){
  ?>
  <div class="slider-item" style="background-image:url(admin/uploads/<?= $data['ban_image']; ?>);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-6 ftco-animate">
          <h1 class="mb-4"><?= $data['ban_title']; ?></h1>
          <p><?= $data['ban_subtitle']; ?></p>
          <p>
            <a href="<?= $data['ban_url']; ?>" class="btn btn-primary px-4 py-3 mt-3"><?= $data['ban_button']; ?></a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</section>
<section class="ftco-services ftco-no-pb">
  <div class="container-wrap">
    <div class="row no-gutters">
      <?php 
        $selet = "SELECT * FROM as_feature ORDER BY feat_id ASC LIMIT  0,4";
        $Quer = mysqli_query($con, $selet);
        while($allfeat = mysqli_fetch_assoc($Quer)){ 
      ?>
      <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate <?= $allfeat['feat_bg']; ?>">
        <div class="media block-6 d-block text-center">
          <div class="icon d-flex justify-content-center align-items-center">
            <span class="<?= $allfeat['feat_icon']; ?>"></span>
          </div>
          <div class="media-body p-2 mt-3">
            <h3 class="heading"><?= $allfeat['feat_title']; ?></h3>
            <p><?= $allfeat['feat_subtitle']; ?></p>
          </div>
        </div>
      </div>
      
      <?php } ?>
    </div>
  </div>
</section>
<section class="ftco-section ftco-no-pt ftc-no-pb">
  <div class="container">
    <?php
        $selcon1="SELECT * FROM as_content WHERE content_id=1";
        $Qcon1=mysqli_query($con, $selcon1);
        $con1=mysqli_fetch_assoc($Qcon1);
        ?>
    <div class="row d-flex">
      <div class="col-md-5 order-md-last wrap-about wrap-about d-flex align-items-stretch">
        <div class="img" style="background-image: url(images/about.jpg);border"></div>
      </div>
      <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
        <h2 class="mb-4"><?= $con1['content_title']; ?></h2>
        <p><?= $con1['content_subtitle']; ?></p>
        <div class="row mt-5">
        <?php 
          $selt = "SELECT * FROM as_offer ORDER BY offer_id ASC LIMIT 0,4";
          $query = mysqli_query($con, $selt);
          while( $alloffer = mysqli_fetch_assoc($query)){ 
        ?>
          <div class="col-lg-6">
            <div class="services-2 d-flex">
              <div class="icon mt-2 d-flex justify-content-center align-items-center">
                <span class="<?= $alloffer['offer_icon'] ?>"></span>
              </div>
              <div class="text pl-3">
                <h3><?= $alloffer['offer_title'] ?></h3>
                <p><?= $alloffer['offer_subtitle'] ?></p>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2 d-flex">
      <div class="col-md-6 align-items-stretch d-flex">
        <div class="img img-video d-flex align-items-center" style="background-image: url(images/about-2.jpg);">
          <div class="video justify-content-center">
            <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
              <span class="ion-ios-play"></span>
            </a>
          </div>
        </div>
      </div>
      <?php
        $selcon2="SELECT * FROM as_content WHERE content_id=2";
        $Qcon2=mysqli_query($con, $selcon2);
        $con2=mysqli_fetch_assoc($Qcon2);
        ?>
      <div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 pt-5">
        <h2 class="mb-4"><?= $con2['content_title']; ?></h2>
        <?= $con2['content_details'] ?>
      </div>
    </div>
    <div class="row d-md-flex align-items-center justify-content-center">
      <div class="col-lg-12">
        <div class="row d-md-flex align-items-center">
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="icon">
                <span class="flaticon-doctor"></span>
              </div>
              <div class="text">
                <strong class="number" data-number="18">0</strong>
                <span>Certified Teachers</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="icon">
                <span class="flaticon-doctor"></span>
              </div>
              <div class="text">
                <strong class="number" data-number="401">0</strong>
                <span>Students</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="icon">
                <span class="flaticon-doctor"></span>
              </div>
              <div class="text">
                <strong class="number" data-number="30">0</strong>
                <span>Courses</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="icon">
                <span class="flaticon-doctor"></span>
              </div>
              <div class="text">
                <strong class="number" data-number="50">0</strong>
                <span>Awards Won</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section">
  <div class="container-fluid px-4">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
      <?php
        $selcon3="SELECT * FROM as_content WHERE content_id=4";
        $Qcon3=mysqli_query($con, $selcon3);
        $con3=mysqli_fetch_assoc($Qcon3);
        ?>
        <h2 class="mb-4">
          <span><?= $con3['content_title'] ?></span>
        </h2>
        <p><?= $con3['content_subtitle'] ?></p>
      </div>
    </div>
    <div class="row">
      <?php 
        $sele = "SELECT * FROM as_course ORDER BY course_id ASC LIMIT 0,4";
        $que = mysqli_query($con, $sele);
        while( $data = mysqli_fetch_assoc($que)){
      ?>
      <div class="col-md-3 course ftco-animate">
        <div class="img" style="background-image: url(admin/uploads/course/<?= $data['course_banner']; ?>);"></div>
        <div class="text pt-4">
          <p class="meta d-flex">
            <span>
              <i class="icon-user mr-2"></i><?= $data['course_teacher']; ?> </span>
            <span>
              <i class="icon-table mr-2"></i><?= $data['course_seat']; ?> </span>
            <span>
              <i class="icon-calendar mr-2"></i><?= $data['course_duration']; ?> </span>
          </p>
          <h3>
            <a href="#"><?= $data['course_title']; ?></a>
          </h3>
          <p> <?= $data['course_details']; ?></p>
          <p>
            <a href="<?= $data['course_btn_url']; ?>" class="btn btn-primary"><?= $data['course_btn']; ?></a>
          </p>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<section class="ftco-section bg-light">
  <div class="container-fluid px-4">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
      <?php
        $selcon5="SELECT * FROM as_content WHERE content_id=5";
        $Qcon5=mysqli_query($con, $selcon5);
        $con5=mysqli_fetch_assoc($Qcon5);
        ?>
        <h2 class="mb-4"><?= $con5['content_title']; ?></h2>
        <p><?= $con5['content_subtitle']; ?></p>
      </div>
    </div>
    <div class="row">
      <?php 
        $selet = "SELECT * FROM as_teacher ORDER BY teacher_id ASC LIMIT 0,4";
        $que = mysqli_query($con, $selet);
        while( $allteacher = mysqli_fetch_assoc($que)){
      ?>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="staff">
          <div class="img-wrap d-flex align-items-stretch">
            <div class="img align-self-stretch" style="background-image: url(admin/uploads/teacher/<?= $allteacher['teacher_image']; ?>);"></div>
          </div>
          <div class="text pt-3 text-center">
            <h3><?= $allteacher['teacher_name'] ?></h3>
            <span class="position mb-2"><?= $allteacher['teacher_designation']; ?></span>
            <div class="faded">
              <p><?= $allteacher['teacher_details']; ?></p>
              <ul class="ftco-social text-center">
                <li class="ftco-animate">
                  <a href="#">
                    <span class="icon-twitter"></span>
                  </a>
                </li>
                <li class="ftco-animate">
                  <a href="#">
                    <span class="icon-facebook"></span>
                  </a>
                </li>
                <li class="ftco-animate">
                  <a href="#">
                    <span class="icon-google-plus"></span>
                  </a>
                </li>
                <li class="ftco-animate">
                  <a href="#">
                    <span class="icon-instagram"></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url(images/bg_5.jpg);" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-md-6 py-5 px-md-5">
        <div class="py-md-5">
          <div class="heading-section heading-section-white ftco-animate mb-5">
          <?php
        $selcon6="SELECT * FROM as_content WHERE content_id=6";
        $Qcon6=mysqli_query($con, $selcon6);
        $con6=mysqli_fetch_assoc($Qcon6);
        ?>
            <h2 class="mb-4"><?= $con6['content_title'] ?></h2>
            <p><?= $con6['content_subtitle'] ?></p>
          </div>

          <?php 
            if(!empty($_POST)){
              $fname = $_POST['fname'];
              $lname = $_POST['lname'];
              $phone = $_POST['phone'];
              $mess = $_POST['mess'];
              $course = $_POST['course'];
              
              if(!empty($phone)){
              $insert = "INSERT INTO as_quote(quote_fname, quote_lname, quote_phone, quote_mess, course_list_id)VALUES('$fname', '$lname', '$phone', '$mess', '$course')";
              if(mysqli_query($con, $insert)){
                $_SESSION['status'] = "Successfully send your quote message.";
          ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?= $_SESSION['status']; ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
          <?php
               } else{
              $_SESSION['status'] = "Opps! There is an error.";
          ?>    
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?= $_SESSION['status']; ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
                <?php
              }

          }else{
            $_SESSION['status'] = "Please insert your phone number.";
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?= $_SESSION['status']; ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php
          }
        }
          ?>

          <form method="POST" action="#" class="appointment-form ftco-animate">
            <div class="d-md-flex">
              <div class="form-group">
                <input type="text" class="form-control" name="fname" placeholder="First Name">
              </div>
              <div class="form-group ml-md-4">
                <input type="text" class="form-control" name="lname" placeholder="Last Name">
              </div>
            </div>
            <div class="d-md-flex">
              <div class="form-group">
                <div class="form-field">
                  <div class="select-wrap">
                    <div class="icon">
                      <span class="ion-ios-arrow-down"></span>
                    </div>
                    <select name="course" class="form-control">
                      <option value="0">Select Your Course</option>
                      <?php 
                      $select = "SELECT * FROM as_course_list ORDER BY course_list_id ASC";
                      $Qy = mysqli_query($con, $select);
                      while($allcourse = mysqli_fetch_assoc($Qy)){
                      ?>
                      <option value="<?= $allcourse['course_list_id'] ?>"><?= $allcourse['course_list_name'] ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group ml-md-4">
                <input type="text" class="form-control" name="phone" placeholder="Phone">
              </div>
            </div>
            <div class="d-md-flex">
              <div class="form-group">
                <textarea name="mess" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group ml-md-4">
                <input type="submit" value="Request A Quote" class="btn btn-primary py-3 px-4">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
      <?php
        $selcon7="SELECT * FROM as_content WHERE content_id=7";
        $Qcon7=mysqli_query($con, $selcon7);
        $con7=mysqli_fetch_assoc($Qcon7);
        ?>
        <h2 class="mb-4">
          <span><?= $con7['content_title']; ?></span>
        </h2>
        <p><?= $con7['content_subtitle'] ?></p>
      </div>
    </div>
    <div class="row">
      
    <?php
      $slet = "SELECT * FROM as_blog NATURAL JOIN as_role ORDER BY blog_id ASC LIMIT 0,3";
      $Qer = mysqli_query($con, $slet);
      while( $info = mysqli_fetch_assoc($Qer)){
    ?>
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="blog-entry">
          <a href="<?= $info['blog_url']; ?>" class="block-20 d-flex align-items-end" style="background-image: url('admin/uploads/blog/<?= $info['blog_image'] ?>');">
            <div class="meta-date text-center p-2">
              <span class="day">26</span>
              <span class="mos">June</span>
              <span class="yr">2019</span>
            </div>
          </a>
          <div class="text bg-white p-4">
            <h3 class="heading">
              <a href="<?= $info['blog_url']; ?>"><?= $info['blog_title']; ?></a>
            </h3>
            <p> <?= $info['blog_subtitle']; ?></p>
            <div class="d-flex align-items-center mt-4">
              <p class="mb-0">
                <a href="<?= $info['blog_url']; ?>" class="btn btn-primary"><?= $info['blog_btn']; ?> <span class="ion-ios-arrow-round-forward"></span>
                </a>
              </p>
              <p class="ml-auto mb-0">
                <a href="<?= $info['blog_url']; ?>" class="mr-2"><?= $info['role_name']; ?></a>
                <a href="#" class="meta-chat">
                  <span class="icon-chat"></span> 3 </a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<section class="ftco-section testimony-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
      <?php
        $selcon8="SELECT * FROM as_content WHERE content_id=8";
        $Qcon8=mysqli_query($con, $selcon8);
        $con8=mysqli_fetch_assoc($Qcon8);
        ?>
        <h2 class="mb-4"><?= $con8['content_title'] ?></h2>
        <p><?= $con8['content_subtitle'] ?></p>
      </div>
    </div>
    <div class="row ftco-animate justify-content-center">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel">
          
        <?php 
          
          $selt = "SELECT * FROM as_review ORDER BY rev_id ASC";
          $Qeury = mysqli_query($con, $selt);
          while( $reviewdata = mysqli_fetch_assoc($Qeury)){
        ?>
          
          <div class="item">
            <div class="testimony-wrap d-flex">
              <div class="user-img mr-4" style="background-image: url('admin/uploads/review/<?= $reviewdata['rev_image']; ?>')"></div>
              <div class="text ml-2">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
                <p><?= $reviewdata['rev_text']; ?></p>
                <p class="name"><?= $reviewdata['rev_name']; ?></p>
                <span class="position"><?= $reviewdata['rev_designation']; ?></span>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-gallery">
  <div class="container-wrap">
    <div class="row no-gutters">
      <?php 
      $selet = "SELECT * FROM as_gallery ORDER BY gallery_id ASC";
      $que = mysqli_query($con, $selet);
      while($gallyinfo = mysqli_fetch_assoc($que)){
      ?>
      
      <div class="col-md-3 ftco-animate">
        <a href="<?= $gallyinfo['gallery_url']; ?>" class="gallery image-popup img d-flex align-items-center" style="background-image: url(admin/uploads/gallery/<?= $gallyinfo['gallery_image'] ?>);">
          <div class="icon mb-4 d-flex align-items-center justify-content-center">
            <span class="icon-instagram"></span>
          </div>
        </a>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php
	get_footer();
?>