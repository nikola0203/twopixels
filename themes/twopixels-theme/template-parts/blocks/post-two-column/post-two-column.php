<?php
/**
 * Template part for displaying page Post Two Columns block.
 *
 */

use Awpt\Plugins\Acf;
$image_left = get_field('image_left');
$title      = get_field('title');
$text       = get_field('text');
$image      = get_field('image');
?>

<section class="post-two-columns bg-light py-12 py-lg-12 my-18">
  <div class="row <?php echo ( $image_left == 1 ) ? 'flex-row-reverse' : ''; ?>">
    <div class="col-12 col-lg-6 <?php echo ( $image_left == 1 ) ? '' : 'mt-xl-8'; ?>">
      <h4><?php echo $title; ?></h4>
      <p><?php echo $text; ?></p>
    </div>
    <div class="col-12 col-lg-6">
      <?php Acf::image( $image, 'large', 'mb-4 w-100' ); ?>
    </div>
  </div>
</section>



