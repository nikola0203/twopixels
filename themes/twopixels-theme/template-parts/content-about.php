<?php 
/*
  Template Name: About Us

*/
use Awpt\Plugins\Acf;
get_header();

$images = get_field('about_repeater');
?>
<section class="section-about-us">
  <div class="container py-12 py-md-22">
    <h4 class="fw-500 text-primary text-center mb-6"><?php echo get_the_title(); ?></h4>
    <h1 class="text-center mb-10"><?php echo get_bloginfo(); ?></h1>
    <div class="images-wrapper mb-10 mb-md-18">
      <div class="row d-flex justify-content-center">
        <?php
        foreach ( $images as $image_key => $image ): ?>
          <div div class="col-12 col-md-6 col-lg-4 position-relative mb-6 mb-md-0">
            <div class="image-wrapper">
              <?php Acf::image( $image['image'], 'large', 'mb-4 w-100 h-100' ); ?>
            </div>
            <div class="<?php echo ( $image_key == 0 ) ? 'overlay-top' : 'overlay-bot'; ?>"></div>
            <p class="mb-xs-6 mb-0 text-info"><?php echo $image['image']['caption'] ?></p>
          </div>
        <?php
        endforeach;?>
      </div>
    </div>
    <div class="col-12 col-md-9 col-lg-6 m-md-auto text-primary">
      <?php
      the_content();
      ?>
    </div>
  </div>
</section>
  <?php
    get_footer();
  ?>
