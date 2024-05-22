<?php 
/*
  Template Name: About Us


*/
use Awpt\Plugins\Acf;
get_header();
$term_object = get_queried_object();
$term_id = get_queried_object()->term_id;
$term_args = array(
  'category'    => $term_id,
  'numberposts' => -1
);
$posts = get_posts($term_args);
$sub_title = get_field('taxonomy_title', $term_object);
$terms_args = [
  'taxonomy'   => 'category',
  'parent'     => $term_id,
  'hide_empty' => false,

];
$terms = get_terms($terms_args);
$count = count($terms);
$count_posts = count($posts);
?>
  <section class="archive-menu bg-primary mb-lg-22">
		<nav id="site-navigation" role="navigation" class="container d-lg-flex align-items-lg-center">
			<div class="pt-7 nav-logo-btn-wrapper d-flex align-items-center">
				<div class="navtoggle relative d-flex justify-content-end align-items-center d-lg-none">
					<div class="navtoggle__icon"></div>
				</div>
			</div>
			<div class="mt-8">
				<?php
				if ( has_nav_menu( 'primary' ) ) :
					wp_nav_menu(
						array(
							'theme_location'  => 'secondary',
							'menu_id'         => 'secondary-menu',
							'menu_class'      => 'menu d-lg-flex align-items-lg-center ps-0',
							'container_id'    => 'secondary-menu-container',
							'container_class' => 'ms-lg-auto',
						)
					);
				endif;
				?>
			</div>
		</nav>
  </section>
  <section class="section-archive-posts">
    <div class="container">
      <div class="category-info mb-10 mb-lg-18">
        <div class="row">
          <div class="col-12 col-lg-3 d-lg-flex align-items-lg-end mb-6 mb-lg-0">
            <h2 class="m-0 text-primary w-75"><?php echo $term_object->name; ?></h2>
          </div>
          <div class="col-md-8 col-lg-5 d-lg-flex align-items-lg-end mb-6 mb-lg-0">
            <p class="m-0 text-primary"><?php echo $term_object->description; ?></p>
          </div>
          <div class="col-12 col-lg-4 d-lg-flex justify-content-lg-end align-items-lg-end">
            <span class="text-primary fw-bold"><?php echo ( $term_object->parent == 0 ) ? $count : $count_posts; ?> <?php echo ( $term_object->parent == 0 ) ? 'vrhova' : 'postova'; ?></span>
          </div>
        </div>
      </div>
      <?php
        if( $term_object->parent == 0 & $count > 0):
          ?>
          <div class="category-repeater mb-10 mb-lg-18 position-relative">
            <div class="swiper sub-categories">
              <div class="swiper-wrapper" style="height: 320px">
                <?php
                if ( $terms ):
                  foreach ( $terms as $term ) :
                    $image = get_field('category_image', $term);
                    $term_title = $term->name;
                    $term_link = get_term_link($term->term_id);
                    ?>
                    <div class="swiper-slide">
                      <div class="term-wrapper mb-lg-0 position-relative d-flex align-items-end h-100" style="background-image: url(<?php echo $image['url']; ?>)">
                        <div class="term-info-wrapper ms-6">
                          <a href="<?php echo esc_url( $term_link ); ?>"><h4 class="txt-white lh-1 mb-2"><?php echo $term_title; ?></h4></a>
                          <ul class="p-0">
                            <li class="text-white ms-6"><?php echo $term->count; ?> postova</li>
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
            <div class="swiper-button-next swiper-button-next-sub-categories d-none d-lg-flex bg-primary "></div>
            <div class="swiper-button-prev swiper-button-prev-sub-categories d-none d-lg-flex bg-primary "></div>
            <div class="swiper-pagination"></div>
          </div>
          <?php
        endif;
      if ( $term_object->parent == 0 ):
        ?>
        <div class="sub-title-wrapper mb-10 mb-lg-18 pt-18">
          <div class="row">
            <div class="col-12 col-lg-6 d-lg-flex align-items-lg-end mb-6 mb-lg-0">
              <h3 class="m-0 text-primary"><?php echo $sub_title; ?></h3>
            </div>
            <div class="col-12 col-lg-6 d-lg-flex justify-content-lg-end align-items-lg-end">
              <span class="text-primary fw-bold"><?php echo $term_object->count; ?> postova</span>
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
