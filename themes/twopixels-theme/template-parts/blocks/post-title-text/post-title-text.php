<?php
/**
 * Template part for displaying page Post Title and Text block.
 *
 */

use Awpt\Plugins\Acf;
$title = get_field( 'title' );
$text  = get_field( 'text' );
?>

<section class="section-title-text py-22 bg-light">
  <h4 class="m-0 mb-6"><?php echo $title; ?></h4>
  <p class="m-0 p-big"><?php echo $text; ?></p>
</section>