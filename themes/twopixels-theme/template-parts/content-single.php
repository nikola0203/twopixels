<?php 
/*
  Template Name: Single Page

*/
use Awpt\Plugins\Acf;
$image = get_the_post_thumbnail();
$date = get_the_date( __('M, Y', 'textdomain'));
$post_category = get_the_category();
$s = get_cat_name($post_category);
foreach ( $post_category as $category ):
  if ( $category->parent != 0 ):
    $category_name = $category->name;
    $category_url = get_category_link($category);
  endif;
endforeach;
?>
  <section class="section-single-page-header my-18">
    <div class="container d-flex justify-content-center">
      <div class="single-post-info text-center w-75">
        <div class="breadcrums mb-12 text-info">
          <a href="<?php echo get_home_url(); ?>" class="text-info fw-normal"><span class="me-5">Početna</span></a><span class="me-5">></span><a href="<?php echo esc_url($category_url); ?>" class="text-info fw-normal"><span class="me-5"><?php echo $category_name; ?></span></a><span class="me-5">></span><span class=""><?php the_title(); ?></span>
        </div>
        <h1 class="mb-12"><?php the_title(); ?></h1>
        <div class="date-wrapper text-black">
          <span><?php echo $date; ?></span>
          <a href="<?php echo esc_url( $category_url ); ?>" class="fw-normal category-link ms-2"><span class="category-name ms-2"><?php echo $category_name; ?></span></a>
        </div>
      </div>
    </div>
  </section>
  <section class="section-single-page-content d-flex justify-content-center pb-30">
    <div class="container">
      <div class="image-wrapper mb-12">
        <?php echo $image; ?>
      </div>
      <div class="single-container">
        <?php the_content(); ?>
      </div>
    </div>
  </section>
  <section class="section-comments bg-light py-18">
    <div class="container">
      <div class="single-container">
        <div class="comments-container">
          <?php comments_template(); ?>
        </div>
      </div>
    </div>
  </section>
  <section class="single-recent-posts bg-primary pb-24">
    <?php get_template_part( 'template-parts/content', 'recent-posts' ); ?>
  </section>
  <?php get_template_part( 'template-parts/content', 'newsletter' ); ?>