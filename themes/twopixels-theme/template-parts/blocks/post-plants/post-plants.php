<?php
/**
 * Template part for displaying page Post Plants block.
 *
 */

use Awpt\Plugins\Acf;
$objects = get_field('post_plants_repeater');
?>

<section class="section-post-plants bg-light py-18 mt-18">
  <?php 
  foreach ( $objects as $object ):
    $title = $object['plant_title'];
    $text  = $object['plant_text'];
    $image = $object['plant_image'];
    ?>
    <h4><?php echo $title; ?></h4>
    <p><?php echo $text; ?></p>
    <?php Acf::image( $image, 'large', 'mb-4 w-100 h-100' ); ?>
    <?php
  endforeach;
  ?>
</section>

