<?php
    require_once('functions/function.php');
    needLogged();
    get_header();
    get_sidebar();
?>

    <div class="col-md-12 main_content">
        <h4>Welcome <?= $_SESSION['name']; ?></h4>
    </div>

<?php
    get_footer();
?>