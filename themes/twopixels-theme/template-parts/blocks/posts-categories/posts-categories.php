<?php
/**
 * Template part for displaying page Posts Categories block.
 *
 */

use Awpt\Plugins\Acf;
$title = get_field( 'title' );
$text = get_field( 'text' );
$taxonomies = get_field( 'post_category' );
$archive_link = get_post_type_archive_link( 'post' );
?>

<section class="section-posts-categories bg-light py-15 py-lg-30">
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
          <a href="<?php echo esc_url( $archive_link ); ?>" class="btn btn-primary">Pogledaj sve postove</a>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
        foreach ( $taxonomies as $key => $taxonomy ):
          $image = get_field('category_image', $taxonomy);
          $link = get_term_link( $taxonomy );
            if ( $key < 6 ):
              ?>
              <div class="col-md-6 col-xl-4 mb-8">
                <div class="category-wrapper d-flex flex-column justify-content-end" style="background-image: url(<?php echo $image['url']; ?>)">
                  <a href="<?php echo esc_url( $link ); ?>"><h4 class="txt-white ms-12 lh-1 mb-2"><?php echo $taxonomy->name; ?></h4></a>
                  <ul class="p-0 ms-16">
                    <li class="text-white mb-12"><?php echo $taxonomy->count; ?> posta</li>
                  </ul>
                </div>
              </div>
              <?php
            endif;
        endforeach;
      ?>
    </div>
  </div>
</section>

