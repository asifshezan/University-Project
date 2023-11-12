<?php
	// print_r($_SERVER);
	// echo($_SERVER['PHP_SELF']);
	$link = explode('/', $_SERVER['PHP_SELF']);
	// print_r($link);
	$page = $link[2];
	// echo $page;
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">
            <?php
            if($page=='about.php'){echo 'About Us';}
            elseif($page=='courses.php'){echo 'Courses';}
            elseif($page=='teacher.php'){echo 'Certified Teacher';}
            elseif($page=='blog.php'){echo 'Blogs';}
            elseif($page=='contact.php'){echo 'Contact Us';}
            else{echo 'Page Name';}
          ?>
            
            </h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>
            <?php
            if($page=='about.php'){echo 'About Us';}
            elseif($page=='courses.php'){echo 'Courses';}
            elseif($page=='teacher.php'){echo 'Staff';}
            elseif($page=='blog.php'){echo 'Blogs';}
            elseif($page=='contact.php'){echo 'Contact Us';}
            else{echo 'Page Name';}
          ?>   
            <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
</section>