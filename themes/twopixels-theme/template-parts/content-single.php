<?php 
/*
  Template Name: Single Page

*/
use Awpt\Plugins\Acf;
$image = get_the_post_thumbnail();
$date = get_the_date('M, Y');
$post_category = get_the_category();
$s = get_cat_name($post_category);
foreach ( $post_category as $category ):
  if ( $category->parent != 0 ):
    $category_name = $category->name;
  endif;
endforeach;
?>
  <section class="section-single-page-header mb-18">
    <div class="container d-flex justify-content-center">
      <div class="single-post-info text-center w-75">
        <h1><?php the_title(); ?></h1>
        <div class="date-wrapper">
          <span><?php echo $date; ?></span>
          <span class="category-name"><?php echo $category_name; ?></span>
        </div>
      </div>
    </div>
  </section>
  <section class="section-single-page-content d-flex justify-content-center">
    <div class="container">
      <div class="image-wrapper">
        <?php echo $image; ?>
      </div>
      <div class="single-container">
        <?php the_content(); ?>
      </div>
    </div>
  </section>
