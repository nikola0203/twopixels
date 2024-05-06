<?php 
/*
  Template Name: About Us

*/
use Awpt\Plugins\Acf;
get_header();
$term = get_queried_object();
$term_id = get_queried_object()->term_id;
$args = array(
  'category'   => $term_id,
  'numberposts'=> -1
);
$posts = get_posts($args);
$sub_title = get_field('taxonomy_title', $term);
?>
  <section class="archive-menu">
  </section>
  <section class="section-archive-posts">
    <div class="container">
      <div class="category-info mb-10 mb-lg-18">
        <div class="row">
          <div class="col-12 col-lg-3 d-lg-flex align-items-lg-end mb-6 mb-lg-0">
            <h2 class="m-0 text-primary"><?php echo $term->name; ?></h2>
          </div>
          <div class="col-md-8 col-lg-5 d-lg-flex align-items-lg-end mb-6 mb-lg-0">
            <p class="m-0 text-primary"><?php echo $term->description; ?></p>
          </div>
          <div class="col-12 col-lg-4 d-lg-flex justify-content-lg-end align-items-lg-end">
            <span class="text-primary fw-bold"><?php echo $term->count; ?> <?php echo ( $term->parent == 0 ) ? 'vrhova' : 'postova'; ?></span>
          </div>
        </div>
      </div>
      <?php
      if ( $term->parent == 0 ):
        ?>
        <div class="sub-title-wrapper mb-10 mb-lg-18">
          <div class="row">
            <div class="col-12 col-lg-6 d-lg-flex align-items-lg-end mb-6 mb-lg-0">
              <h3 class="m-0 text-primary"><?php echo $sub_title; ?></h3>
            </div>
            <div class="col-12 col-lg-6 d-lg-flex justify-content-lg-end align-items-lg-end">
              <span class="text-primary fw-bold"><?php echo $term->count; ?> postova</span>
            </div>
          </div>
        </div>
       <?php
      endif;
      ?>
      <div class="row">
        <?php 
        foreach ( $posts as $key => $post ) :
          $image = get_the_post_thumbnail_url($post);
          $date = get_the_date('M, Y',$post);
          $post_title = $post->post_title;
          $post_link = get_permalink($post);
          if ( $key == 0):
            ?>
            <div class="col-md-6 col-lg-6 mb-12">
              <div class="post-wrapper d-flex align-items-end" style="background-image: url(<?php echo $image; ?>)">
                <div class="post-info-wrapper ms-12 mb-12">
                  <ul class="p-0 text-white mb-0"><li class="ms-6"><?php echo $date; ?></li></ul>
                  <a href="<?php echo esc_url( $post_link ); ?>"><h3 class="text-white mb-0"><?php echo $post_title; ?></h3></a>
                </div>
              </div>
            </div>
            <?php
            else:
              ?>
              <div class="col-md-6 col-lg-3 mb-12">
                <div class="post-wrapper">
                  <div class="post-wrapper d-flex align-items-end" style="background-image: url(<?php echo $image; ?>)">
                    <div class="post-info-wrapper px-12 mb-12">
                      <ul class="p-0 text-white mb-0"><li class="ms-6"><?php echo $date; ?></li></ul>
                      <a href="<?php echo esc_url( $post_link ); ?>"><h3 class="text-white mb-0"><?php echo $post_title; ?></h3></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            endif;
        endforeach;
        ?>
      </div>
    </div>
  </section>
<?php
  get_footer();
?>
