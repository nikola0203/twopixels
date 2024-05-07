<?php 
/*
  Template Name: About Us

*/
use Awpt\Plugins\Acf;
get_header();
$term = get_queried_object();
$term_id = get_queried_object()->term_id;
$term_args = array(
  'category'   => $term_id,
  'numberposts'=> -1
);
$posts = get_posts($term_args);
$sub_title = get_field('taxonomy_title', $term);
$terms_args = [
  'taxonomy' => 'category',
  'parent'   => $term_id,
];
$terms = get_terms($terms_args);
print_var($terms);
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
      <div class="category-repeater">
        <div class="swiper sub-categories">
          <div class="swiper-wrapper" style="height: 600px">
          <?php
          if ( $terms ):
            foreach ( $terms as $term ) :
              $image = get_field('category_image', $term);
              $term_title = $term->name;
              $term_link = get_permalink($term);
              ?>
              <div class="swiper-slide">
                <div class="term-wrapper mb-12 mb-lg-0 position-relative d-flex align-items-end h-100" style="background-image: url(<?php echo $image['url']; ?>)">
                  <div class="term-info-wrapper ms-12 mb-12">
                    <a href="<?php echo esc_url( $link ); ?>"><h4 class="txt-white ms-12 lh-1 mb-2"><?php echo $term_title; ?></h4></a>
                    <ul class="p-0 ms-16">
                      <li class="text-white mb-12"><?php echo $term->count; ?> posta</li>
                    </ul>
                  </div>
                </div>
              </div>
              <?php 
            endforeach;
          endif;
          ?>
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
            ?>
            <div class="col-lg-6 mb-12">
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
        endforeach;
        ?>
      </div>
    </div>
  </section>
<?php
  get_footer();
?>
