<?php
/**
 * Template part for displaying page Advices block.
 *
 */

use Awpt\Plugins\Acf;
$title = get_field( 'title' );
$advices = get_field( 'advices_repeater' );
?>

<section class="section-advices mb-12">
  <div class="container">
    <h3 class="text-primary"><?php echo $title; ?></h3>
    <div class="row">
      <?php
        if( !empty( $advices ) ):
          foreach ( $advices as $key => $advice ): 
            if ( $key < 3 ):
              ?>
              <div class="col-md-4 d-flex">
                <div class="advice-wrapper mb-6 mb-md-0 bg-primary px-8 py-12 p-xl-22 flex-column justify-content-between h-auto">
                  <div class="icon-wrapper mb-10">
                    <?php Acf::image( $advice['advice_icon'], 'large', 'w-100 h-100' ); ?>
                  </div>
                  <div class="text-wrapper">
                    <h4 class="text-white mb-6"><?php echo $advice['advice_title']; ?></h4>
                    <p class="text-small text-white mb-0"><?php echo $advice['advice_text']; ?></p>
                  </div>
                </div>
              </div>
              <?php
            endif;
          endforeach; 
        endif;
        ?>
    </div>
  </div>

</section>