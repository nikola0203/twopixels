<?php
/**
 * Template part for displaying page Main Categories block.
 *
 */

use Awpt\Plugins\Acf;
use Awpt\Custom\Custom;

?>

<section class="section-newsletter py-12 py-lg-32 bg-light">
  <div class="container">
    <div class="text-wrapper text-center mb-14">
      <h3 class="mb-8">Prijavite se za naš Newsletter!</h3>
      <p class="m-auto">Budite u toku sa najnovijim vestima, savetima i specijalnim ponudama! Budite deo naše zajednice ljubitelja prirode i avanture!</p>
    </div>
    <div class="contact-form d-flex m-auto">
      <?php echo do_shortcode( '[contact-form-7 id="856c876" title="Newsletter"]' ); ?>
    </div>
  </div>
</section>


