<?php
/**
 * Template part for displaying page Newsletter block.
 *
 */

use Awpt\Plugins\Acf;
$title = get_field( 'title' );
$text  = get_field( 'text' );
?>

<section class="section-newsletter py-12 py-lg-32 bg-light">
  <div class="container">
    <div class="text-wrapper text-center mb-14">
      <h3 class="mb-8"><?php echo $title; ?></h3>
      <p class="m-auto"><?php echo $text; ?></p>
    </div>
    <div class="contact-form d-flex m-auto">
      <?php echo do_shortcode( '[contact-form-7 id="856c876" title="Newsletter"]' ); ?>
    </div>
  </div>
</section>