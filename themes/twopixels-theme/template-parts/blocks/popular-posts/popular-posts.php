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

<section class="section-popular-posts py-10 position-relative mb-30">
  <div class="container position-relative">
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
      <div class="swiper-wrapper" style="height: 600px">
      <?php
      if ( $posts ):
        foreach ( $posts as $post ) :
          $image = get_the_post_thumbnail_url($post);
          $date = get_the_date('M, Y',$post);
          $post_title = $post->post_title;
          $post_link = get_permalink($post);
          $categories = get_the_category($post->ID);
          ?>
          <div class="swiper-slide">
            <div class="post-wrapper mb-12 mb-lg-0 position-relative d-flex align-items-end h-100" style="background-image: url(<?php echo $image; ?>)">
              <?php
              foreach ( $categories as $category ):
                if ( $category->parent != 0 ):
                  ?>
                  <div class="category-wrapper position-absolute h-auto py-4 px-8 bg-white" >
                    <span><?php echo $category->name; ?></span>
                  </div>
                  <?php
                endif;
              endforeach;
              ?>
              <div class="post-info-wrapper ms-12 mb-12">
                <ul class="p-0 mb-4"><li class="text-white ms-6"><?php echo $date; ?></li></ul>
                <a href="<?php echo esc_url( $post_link ); ?>"><h3 class="text-white"><?php echo $post_title; ?></h3></a>
              </div>
            </div>
          </div>
          <?php 
        endforeach;
      endif;
      ?>
    </div>
  </div>
  <div class="swiper-button-next swiper-button-next-popular-services d-none d-lg-flex bg-primary "></div>
  <div class="swiper-button-prev swiper-button-prev-popular-services d-none d-lg-flex bg-primary "></div>
  <div class="swiper-pagination"></div>
    
    
</section>

