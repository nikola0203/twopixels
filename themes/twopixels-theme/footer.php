<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awpt
 */
use Awpt\Custom\Footer;
use Awpt\Plugins\Acf;
$settings = get_field( 'footer_settings','option' );
$text  = ( ! empty( $settings['text'] ) ) ? $settings['text'] : '';
$facebook_link  = ( ! empty( $settings['facebook_link'] ) ) ? $settings['facebook_link'] : '';
$instagram_link  = ( ! empty( $settings['instagram_link'] ) ) ? $settings['instagram_link'] : '';
$youtube_link  = ( ! empty( $settings['youtube_link'] ) ) ? $settings['youtube_link'] : '';
$taxonomies  = ( ! empty( $settings['taxonomy'] ) ) ? $settings['taxonomy'] : '';
?>


	<footer id="colophon" class="site-footer bg-primary py-12 pt-md-22 pb-md-12 text-white">
		<div class="site-info">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-3 mb-12 mb-md-22 text-center text-md-start">
						<div class="footer-logo-wrapper mb-10">
							<?php Footer::logo(); ?>
						</div>
						<p class="text-gray"><?php echo $text; ?></p>
					</div>
					<div class="d-none d-md-block col-md-1"></div>
					<div class="col-6 col-md-5">
						<h4>Sve kategorije</h4>
						<div class="row">
							<div class="col-sm-6">
								<ul> 
									<?php
										foreach ( $taxonomies as $taxonomy_key => $taxonomy ):
											$taxonomy_link = get_term_link( $taxonomy );
											if ( $taxonomy_key < 4 ): ?>
												<li><a href="<?php echo $taxonomy_link; ?>"><?php echo $taxonomy->name; ?></a></li>
												<?php
											endif; 
										endforeach;
									?>
								</ul>
							</div>
							<div class="d-none d-md-block col-sm-6">
								<ul> 
									<?php
										foreach ( $taxonomies as $taxonomy_key => $taxonomy ): 
											$taxonomy_link = get_term_link( $taxonomy );
											if ( $taxonomy_key > 3 & $taxonomy_key < 8 ): ?>
												<li><a href="<?php echo $taxonomy_link; ?>"><?php echo $taxonomy->name; ?></a></li>
												<?php
											endif;  
										endforeach;
									?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-3">
						<?php dynamic_sidebar( 'footer-menu' ); ?>
					</div>
				</div>
				<div class="footer-bottom-wrapper border-top border-gray-100 pt-8 pt-md-6 d-sm-flex align-items-center justify-content-between flex-row-reverse">
					<div class="footer-socials text-center mb-6">
						<a href="<?php echo $facebook_link; ?>" class="me-8"><?php echo icon_facebook(); ?></a>
						<a href="<?php echo $youtube_link; ?>" class="me-8"><?php echo icon_youtube(); ?></a>
						<a href="<?php echo $instagram_link; ?>"><?php echo icon_instagram(); ?></a>
					</div>
					<div class="footer-copy">
						<?php Footer::copy(); ?>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
