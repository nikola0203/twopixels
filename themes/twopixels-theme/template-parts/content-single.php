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
  endif;
endforeach;
?>
  <section class="section-single-page-header my-18">
    <div class="container d-flex justify-content-center">
      <div class="single-post-info text-center w-75">
        <div class="breadcrums mb-12 text-info">
          <span class="me-5">Početna</span><span class="me-5">></span><span class="me-5">Blog</span><span class="me-5">></span><span class=""><?php the_title(); ?></span>
        </div>
        <h1 class="mb-12"><?php the_title(); ?></h1>
        <div class="date-wrapper">
          <span><?php echo $date; ?></span>
          <span class="category-name"><?php echo $category_name; ?></span>
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