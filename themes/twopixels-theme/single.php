<?php
/**
 * Single page
 * 
 * @package awpt
 */
get_header();
?>
<main id="post-<?php the_ID(); ?>" <?php post_class( 'site-main' ); ?> class="py-30">
  <?php get_template_part( 'template-parts/content', 'single' ); ?>
</main>
<?php
get_footer();
