<?php
/**
 * Template part for displaying page Main Categories block.
 *
 */

use Awpt\Plugins\Acf;
$title = get_field( 'title' );
$text = get_field( 'text' );
$taxonomies = get_field( 'taxonomy' );
$posts = get_field( 'post_repeater' );
$archive_link = get_post_type_archive_link( 'post' );
?>

<section class="section-main-categories bg-primary pt-30">
  <div class="container">
    <h1 class="text-white text-center"><?php echo $title; ?></h1>
    <p class="text-white text-center"><?php echo $text; ?></p>
    <div class="categories-wrapper">
      <ul class="text-center p-0">
        <a href="" class="btn btn-white align-items-center mb-4 me-2"><li class="d-flex">Svi postovi</li></a>
        <?php
        foreach ( $taxonomies as $key => $taxonomy ):
          $term_link = get_term_link( $taxonomy );
          ?>
          <a href="<?php echo esc_url( $term_link ); ?>" class="btn btn-white mb-4 me-2"><li class="d-flex"><?php echo $taxonomy->name; ?></li></a>
          <?php
        endforeach;
        ?>
      </ul>
    </div>
  </div>
</section>
<section class="section-posts">
  <div class="container">
    <div class="posts-wrapper">
      <div class="row">
        <?php
        foreach ( $posts as $key => $post ):
          $categories = get_the_category($post['post']->ID);
          if ( $key < 2 ):
            $image = get_the_post_thumbnail_url($post['post']);
            $date = get_the_date('M, Y',$post['post']);
            $post_title = $post['post']->post_title;
            $post_link = get_permalink($post['post']);
            ?>
            <div class="col-lg-6">
              <div class="post-wrapper mb-12 mb-lg-0 position-relative d-flex align-items-end" style="background-image: url(<?php echo $image; ?>)">
                <?php
                foreach ( $categories as $category ):
                  if ( $category->parent != 0 ):
                    ?>
                    <div class="category-wrapper position-absolute py-4 px-8 bg-white" >
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
          endif;
        endforeach;
        ?>
      </div>
    </div>
  </div>
</section>

