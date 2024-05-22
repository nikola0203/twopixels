<?php
/**
 * Template part for displaying page Main Categories block.
 *
 */

use Awpt\Plugins\Acf;
use Awpt\Custom\Custom;
$title = get_field( 'title' );
$text = get_field( 'text' );
$popular_posts = get_field( 'post' );
$archive_link = get_post_type_archive_link( 'post' );
$args = [
  'numberposts' => 6,
];
$recent_posts = get_posts($args);
?>

<section class="section-popular-posts py-10 position-relative mb-30">
    <?php 
  if ( $recent_posts ):
    ?>
    <div class="container position-relative">
      <div class="title-wrapper mb-10 mb-lg-18">
        <div class="row">
          <div class="col-12 col-lg-3 d-lg-flex align-items-lg-end mb-lg-0">
            <h2 class="mb-6 m-lg-0"><?php echo $title; ?></h2>
          </div>
          <div class="col-md-8 col-lg-5 d-lg-flex align-items-lg-end mb-lg-0">
            <p class="mb-6 m-lg-0"><?php echo $text; ?></p>
          </div>
          <div class="col-12 col-lg-4 d-lg-flex justify-content-lg-end align-items-lg-end">
            <a href="<?php echo esc_url($archive_link); ?>" class="btn btn-primary">Pogledaj sve postove</a>
          </div>
        </div>
      </div>
      <div class="swiper popular-services">
        <div class="swiper-wrapper" style="height: 600px">
        <?php
        if ( $popular_posts ):
          Custom::getPopularPosts($popular_posts);
          else:
            Custom::getPopularPosts($recent_posts);
        endif;
    ?>
      </div>
    </div>
    <div class="swiper-button-next swiper-button-next-popular-services d-none d-lg-flex bg-primary "></div>
    <div class="swiper-button-prev swiper-button-prev-popular-services d-none d-lg-flex bg-primary "></div>
    <div class="swiper-pagination"></div>
    <?php
  endif;
  ?>
</section>

