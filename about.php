<?php
  require_once('functions/manage.php');
  get_header();
  get_part('bread.php');
?>

		<?php 
      $selt = "SELECT * FROM as_content WHERE content_id = 13";
      $QUE = mysqli_query($con, $selt);
      $abcont = mysqli_fetch_assoc($QUE);
    ?>
		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-5 order-md-last wrap-about wrap-about d-flex align-items-stretch">
						<div class="img" style="background-image: url(admin/Uploads/<?= $abcont['content_image']; ?>); border"></div>
					</div>
          
					<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
          	<h2 class="mb-4"><?= $abcont['content_title']; ?></h2>
            <?= $abcont['content_details']; ?>
					</div>
				</div>
			</div>
		</section>
		
		<?php 
      $selt = "SELECT * FROM as_content WHERE content_id = 14";
      $QUE = mysqli_query($con, $selt);
      $abcont2 = mysqli_fetch_assoc($QUE);
    ?>
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
          <div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 pt-5">
            <h2 class="mb-4"><?= $abcont2['content_title']; ?></h2>
            <?= $abcont2['content_details']; ?>
          </div>
        </div>	

    		<div class="row d-md-flex align-items-center justify-content-center">
    			<div class="col-lg-12">
    				<div class="row d-md-flex align-items-center">
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="18">0</strong>
		                <span>Certified Teachers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="401">0</strong>
		                <span>Students</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="30">0</strong>
		                <span>Courses</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
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
  <?php
    $sel = "SELECT * FROM as_content WHERE content_id = 8";
    $qe = mysqli_query($con, $sel);
    $redat = mysqli_fetch_assoc($qe);
  ?>
    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><?= $redat['content_title']; ?></h2>
            <?= $redat['content_subtitle']; ?>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <?php
              $selt = "SELECT * FROM as_review ORDER BY rev_id ASC";
              $que = mysqli_query($con, $selt);
              while($revdatta = mysqli_fetch_assoc($que)){
              ?>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(admin/uploads/review/<?= $revdatta['rev_image']; ?>)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p><?= $revdatta['rev_text'] ?></p>
                    <p class="name"><?= $revdatta['rev_name'] ?></p>
                    <span class="position"><?= $revdatta['rev_designation'] ?></span>
                  </div>
                </div>
              </div>
              <?php }?>
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
          $qer = mysqli_query($con, $selet);
          while( $allgall = mysqli_fetch_assoc($qer)){
        ?>  
					<div class="col-md-3 ftco-animate">
						<a href="<?= $allgall['gallery_url']; ?>" class="gallery image-popup img d-flex align-items-center" style="background-image: url(admin/uploads/gallery/<?= $allgall['gallery_image']; ?>);">
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