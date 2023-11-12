<?php
  require_once('functions/manage.php');
  get_header();
  get_part('bread.php');
?> 

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