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
        <div class="d-flex <?php echo ( $key > 0 ) ? 'border-top border-info pt-12 mt-12' : '' ?>">
          <div class="image-wrapper">
            <?php Acf::image( $author['author_image'], 'large', 'm-0' ); ?>
          </div>
          <div class="author-text w-100 ms-12 mt-lg-8">
            <h4 class="p-0 text-white mb-4"><?php echo $author['author_title']; ?></h4>
            <p class="p-0 text-white m-0"><?php echo $author['author_text']; ?></p>
          </div>
        </div>
        <?php
      endforeach;
    endif;
      ?>
</section>





