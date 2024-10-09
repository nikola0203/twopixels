<?php
/**
 * Template part for displaying page Post Share block.
 *
 */

use Awpt\Plugins\Acf;
$link = get_permalink();
$title = get_the_title();
?>

<section class="section-post-share text-center d-xl-flex justify-content-between align-items-center pt-8 mb-18 mt-18 border-top border-dark">
  <h4 class="p-0 mb-8 mb-xl-0">Svideo ti se post? Podeli ga na:</h4>
  <div>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link; ?>" target="_blank"><?php echo icon_facebook_white(); ?></a>
    <a href="https://twitter.com/intent/tweet?url=<?php echo $link; ?>&text=<?php echo $title; ?>"><?php echo icon_x(); ?></a>
    <a href="mailto:recipient@example.com?subject=<?php echo $title; ?>&body=YOUR_MESSAGE%20<?php echo $link; ?>"><?php echo icon_gmail(); ?></a>
    <a href="<?php echo $link; ?>" id="copy-url"><?php echo icon_link(); ?></a>
  </div>
</section>




