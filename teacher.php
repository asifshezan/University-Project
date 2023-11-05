<?php
  require_once('functions/manage.php');
  get_header();
?> <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Certified Teacher</h1>
        <p class="breadcrumbs">
          <span class="mr-2">
            <a href="index-2.html">Home <i class="ion-ios-arrow-forward"></i>
            </a>
          </span>
          <span>Teacher <i class="ion-ios-arrow-forward"></i>
          </span>
        </p>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section bg-light">
  <div class="container-fluid px-4">
    <div class="row">
	<?php 
        $selet = "SELECT * FROM as_teacher ORDER BY teacher_id ASC";
        $que = mysqli_query($con, $selet);
        while( $allteacher = mysqli_fetch_assoc($que)){
      ?>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="staff">
          <div class="img-wrap d-flex align-items-stretch">
            <div class="img align-self-stretch" style="background-image: url(admin/uploads/teacher/<?= $allteacher['teacher_image'] ?>);"></div>
          </div>
          <div class="text pt-3 text-center">
            <h3><?= $allteacher['teacher_name'] ?></h3>
            <span class="position mb-2"><?= $allteacher['teacher_designation'] ?></span>
            <div class="faded">
              <p><?= $allteacher['teacher_details'] ?></p>
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
</section> <?php
  get_footer();
?>