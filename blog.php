<?php
  require_once('functions/manage.php');
  get_header();
?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Certified Teacher</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index-2.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Teacher <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
    <?php
      $slet = "SELECT * FROM as_blog NATURAL JOIN as_role ORDER BY blog_id ASC";
      $Qer = mysqli_query($con, $slet);
      while( $allblog = mysqli_fetch_assoc($Qer)){
    ?>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="<?= $allblog['blog_url'] ?>" class="block-20 d-flex align-items-end" style="background-image: url('admin/uploads/blog/<?= $allblog['blog_image'] ?>');">
								<div class="meta-date text-center p-2">
                  <span class="day">26</span>
                  <span class="mos">June</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="<?= $allblog['blog_url'] ?>"><?= $allblog['blog_title'] ?></a></h3>
                <p><?= $allblog['blog_subtitle'] ?></p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="<?= $allblog['blog_url'] ?>" class="btn btn-primary"><?= $allblog['blog_btn'] ?> <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="<?= $allblog['blog_url'] ?>" class="mr-2"><?= $allblog['role_name'] ?></a>
	                	<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
	                </p>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
			</div>
		</section>
		
    <?php
  get_footer();
?>