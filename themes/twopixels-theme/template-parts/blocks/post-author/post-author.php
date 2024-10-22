<?php
/**
 * Template part for displaying page Post Author block.
 *
 */

use Awpt\Plugins\Acf;
$authors = get_field( 'author_repeater' );
?>
<section class="section-post-authors bg-primary py-12 py-lg-18">
  <?php
    if ( $authors ):
      foreach ( $authors as $key => $author ):
        ?>
        <div class="row <?php echo ( $key > 0 ) ? 'border-top border-info pt-12 mt-12' : '' ?>">
          <div class="col-sm-12 col-md-6 col-xl-4 image-wrapper">
            <?php Acf::image( $author['author_image'], 'large', 'm-0' ); ?>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-8 author-text mt-6 mt-md-0 mt-xl-6">
            <h4 class="p-0 text-white mb-4"><?php echo $author['author_title']; ?></h4>
            <p class="p-0 text-white m-0"><?php echo $author['author_text']; ?></p>
          </div>
        </div>
        <?php
      endforeach;
    endif;
      ?>
</section>





