<?php
/**
 * Template part for displaying page Post Data block.
 *
 */

use Awpt\Plugins\Acf;
$distance_title = get_field('distance_title');
$distance_icon  = get_field('distance_icon');
$distance       = get_field('distance');

$altitude_title = get_field('altitude_title');
$altitude_icon  = get_field('altitude_icon');
$altitude       = get_field('altitude');

$difficulty_title = get_field('difficulty_title');
$difficulty_icon  = get_field('difficulty_icon');
$difficulty       = get_field('difficulty');

?>

<section class="section-post-data bg-white position-relative mb-10 mb-lg-18">
  <div class="d-flex justify-content-around pt-10 pt-lg-14  pb-12 pb-lg-18 border-bottom border-dark text-center">
    <div class="">
      <?php Acf::image( $distance_icon, 'thumbnail', 'mb-4' ); ?>
      <p class="p-big text-primary fw-500"><?php echo $distance_title; ?></p>
      <h4 class="fw-bold text-primary"><?php echo $distance; ?></h4>
    </div>
    <div class="">
      <?php Acf::image( $altitude_icon, 'thumbnail', 'mb-4' ); ?>
      <p class="p-big text-primary fw-500"><?php echo $altitude_title; ?></p>
      <h4 class="fw-bold text-primary"><?php echo $altitude; ?></h4>
    </div>
    <div class="">
      <?php Acf::image( $difficulty_icon, 'thumbnail', 'mb-4' ); ?>
      <p class="p-big text-primary fw-500"><?php echo $difficulty_title; ?></p>
      <?php
        switch ($difficulty) {
          case 1:
            echo icon_difficulity_red();
            echo icon_difficulity_gray();
            echo icon_difficulity_gray();
            echo icon_difficulity_gray();
            echo icon_difficulity_gray();
            break;
          case 2:
            echo icon_difficulity_red();
            echo icon_difficulity_red();
            echo icon_difficulity_gray();
            echo icon_difficulity_gray();
            echo icon_difficulity_gray();
            break;
          case 3:
            echo icon_difficulity_red();
            echo icon_difficulity_red();
            echo icon_difficulity_red();
            echo icon_difficulity_gray();
            echo icon_difficulity_gray();
            break;
          case 4:
            echo icon_difficulity_red();
            echo icon_difficulity_red();
            echo icon_difficulity_red();
            echo icon_difficulity_red();
            echo icon_difficulity_gray();
            break;
          case 5:
            echo icon_difficulity_red();
            echo icon_difficulity_red();
            echo icon_difficulity_red();
            echo icon_difficulity_red();
            echo icon_difficulity_red();
            break;
        }
      ?>
    </div>
  </div>
</section>



