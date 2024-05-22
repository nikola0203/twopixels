<?php
/**
 * Template part for displaying page Main Categories block.
 *
 */

use Awpt\Plugins\Acf;
use Awpt\Custom\Custom;
$title = get_field( 'title' );
$text = get_field( 'text' );
$archive_link = get_post_type_archive_link( 'post' );
$args = [
  'numberposts' => 6,
];
$recent_posts = get_posts($args);
?>

<section class="section-popular-posts py-10 position-relative py-lg-32">
    <?php 
  if ( $recent_posts ):
    ?>
    <div class="container position-relative">
      <div class="title-wrapper mb-10 mb-lg-18">
        <div class="row">
          <div class="col-12 col-lg-3 d-lg-flex align-items-lg-end mb-lg-0">
            <h2 class="m-0 w-75 text-white mb-8 mb-lg-0"><?php echo $title; ?></h2>
          </div>
          <div class="col-md-8 col-lg-5 d-lg-flex align-items-lg-end mb-lg-0">
            <p class="m-0 text-smaller text-white mb-8 mb-lg-0"><?php echo $text; ?></p>
          </div>
          <div class="col-12 col-lg-4 d-lg-flex justify-content-lg-end align-items-lg-end">
            <a href="<?php echo esc_url($archive_link); ?>" class="btn btn-white">Pogledaj sve postove</a>
          </div>
        </div>
      </div>
      <div class="swiper recent-posts">
        <div class="swiper-wrapper" style="height: 600px">
          <?php Custom::getPopularPosts($recent_posts); ?>
        </div>
      </div>
      <div class="swiper-button-next swiper-button-next-recent-posts d-none d-lg-flex bg-primary "></div>
      <div class="swiper-button-prev swiper-button-prev-recent-posts d-none d-lg-flex bg-primary "></div>
      <div class="swiper-pagination"></div>
    </div>
    <?php
  endif;
  ?>
</section>

