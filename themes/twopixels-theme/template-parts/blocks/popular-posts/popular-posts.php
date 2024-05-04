<?php
/**
 * Template part for displaying page Main Categories block.
 *
 */

use Awpt\Plugins\Acf;
$title = get_field( 'title' );
$text = get_field( 'text' );
$posts = get_field( 'post' );
?>

<section class="section-popular-posts">
  <div class="container">
    <div class="title-wrapper mb-10 mb-lg-18">
      <div class="row">
        <div class="col-12 col-lg-3 d-lg-flex align-items-lg-end mb-6 mb-lg-0">
          <h2 class="m-0"><?php echo $title; ?></h2>
        </div>
        <div class="col-md-8 col-lg-5 d-lg-flex align-items-lg-end mb-6 mb-lg-0">
          <p class="m-0 text-smaller"><?php echo $text; ?></p>
        </div>
        <div class="col-12 col-lg-4 d-lg-flex justify-content-lg-end align-items-lg-end">
          <a href="" class="btn btn-primary">Pogledaj sve postove</a>
        </div>
      </div>
      </div>
      <div class="swiper popular-services">
      <div class="swiper-wrapper">
        <?php
        if ( $posts ):
          foreach ( $posts as $post ) :
            ?>
            <div class="swiper-slide bg-white rounded-bottom-3">
              <h2>Nubs</h2>
            </div>
            <?php 
          endforeach;
        endif;
        ?>
      </div>
    </div>
    <div class="swiper-button-next swiper-button-next-popular-services rounded-circle d-none d-lg-flex bg-white"></div>
    <div class="swiper-button-prev swiper-button-prev-popular-services rounded-circle d-none d-lg-flex bg-white"></div>
  </div>
  <div class="swiper-pagination d-lg-none mb-6"></div>
    
    
</section>

