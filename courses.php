<?php
  require_once('functions/manage.php');
  get_header();
  get_part('bread.php');
?>
    <section class="ftco-section">
			<div class="container-fluid px-4">
				<div class="row">
				<?php 
					$sele = "SELECT * FROM as_course ORDER BY course_id ASC";
					$que = mysqli_query($con, $sele);
					while( $data = mysqli_fetch_assoc($que)){
				?>
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(admin/uploads/course/<?= $data['course_banner']; ?>);"></div>
						<div class="text pt-4">
							<p class="meta d-flex">
								<span><i class="icon-user mr-2"></i><?= $data['course_teacher']; ?></span>
								<span><i class="icon-table mr-2"></i><?= $data['course_seat']; ?></span>
								<span><i class="icon-calendar mr-2"></i><?= $data['course_duration']; ?></span>
							</p>
							<h3><a href="#"><?= $data['course_title']; ?></a></h3>
							<p><?= $data['course_details']; ?></p>
							<p><a href="<?= $data['course_btn_url']; ?>" class="btn btn-primary"><?= $data['course_btn']; ?></a></p>
						</div>
					</div>					
					<?php } ?>
				</div>
			</div>
		</section>
	<?php
  require_once('functions/manage.php');
  get_footer();
?>