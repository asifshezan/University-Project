<?php
  require_once('functions/manage.php');
  get_header();
?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Contact Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index-2.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Address</h3>
	            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Website</h3>
	            <p><a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
          <?php 
          if(!empty($_POST)){
            $name = htmlentities($_POST['name'], ENT_QUOTES);
            $email = htmlentities ($_POST['email'], ENT_QUOTES);
            $subject = htmlentities ($_POST['sub'], ENT_QUOTES);
            $message = htmlentities ($_POST['mess'], ENT_QUOTES);
            $time = date("Y-m-d h:i:sa");
            // $contmess = 'Name: '.$name.'\n'.'Email: '.$email.'\n'.'Subject: '.$sub.'\n'.'Message: '.$message;

            if(!empty($email)){
            $selet = "INSERT INTO as_contact(con_name, con_email, con_subj, con_mess, con_time)VALUES('$name', '$email', '$subject', '$message', '$time')";
            if(mysqli_query($con, $selet)){
              // mail('asifshezan7@gmail.com','University project contact message.',$contmess);
              $_SESSION['status'] = "Successfully send your message.";
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?= $_SESSION['status']; ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php

            }else{
              
              $_SESSION['status'] = "Opps! Failed to send your message.";
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
            $_SESSION['status'] = "Please insert your email.";
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

						<form method="POST" action="">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="sub" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea cols="30" rows="7" class="form-control" name="mess" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
					</div>
					<div class="col-md-6 d-flex align-items-stretch">
						<div id="map"></div>
					</div>
				</div>
			</div>
		</section>

    <?php
  get_footer();
?>