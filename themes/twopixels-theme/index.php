<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package awpt
 */

get_header();
$term_object = get_queried_object();
$term_id = get_queried_object()->term_id;
$term_args = array(
  'category'    => $term_id,
  'numberposts' => -1
);
$posts = get_posts($term_args);
$sub_title = get_field('taxonomy_title', $term_object);
$terms_args = [
  'taxonomy'   => 'category',
  'parent'     => $term_id,
  'hide_empty' => false,

];
$terms = get_terms($terms_args);
$count = count($terms);
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
					<section class="archive-menu bg-primary mb-8 mb-lg-18">
						<nav id="archive-navigation" role="navigation" class="container d-lg-flex align-items-lg-center">
							<div class="justify-content-end pe-8 pt-lg-7 nav-logo-btn-wrapper d-flex align-items-center">
								<div class="navtoggle relative d-flex justify-content-end align-items-center d-lg-none" id="secondary-nav-toggle">
									<div class="navtoggle__icon"></div>
								</div>
							</div>
							<div class="mt-lg-8">
								<?php
								if ( has_nav_menu( 'secondary' ) ) :
									wp_nav_menu(
										array(
											'theme_location'  => 'secondary',
											'menu_id'         => 'secondary-menu',
											'menu_class'      => 'menu d-lg-flex align-items-lg-center ps-0',
											'container_id'    => 'secondary-menu-container',
											'container_class' => 'ms-lg-auto',
										)
									);
								endif;
								?>
							</div>
						</nav>
					</section>
					<div class="container">
						<h1 class="text-center mb-18">Svi postovi</h1>
					</div>
				<?php
			endif;

			/* Start the Loop */
				?>
				<section class="section-archive-posts">
					<div class="container">
						<div class="row">
							<?php 
							foreach ( $posts as $key => $post ) :
								$image = get_the_post_thumbnail_url($post);
								$date = get_the_date('M, Y',$post);
								$post_title = $post->post_title;
								$post_link = get_permalink($post);
									if ( $key == 0 ):
										?>
										<div class="col-lg-12 mb-12">
											<div class="post-wrapper">
												<div class="post-wrapper d-flex align-items-end" style="background-image: url(<?php echo $image; ?>)">
													<div class="post-info-wrapper px-12 mb-12">
														<ul class="p-0 text-white mb-0"><li class="ms-6"><?php echo $date; ?></li></ul>
														<a href="<?php echo esc_url( $post_link ); ?>"><h3 class="text-white mb-0"><?php echo $post_title; ?></h3></a>
													</div>
												</div>
											</div>
										</div>
									<?php
									else: ?>
										<div class="col-lg-6 mb-12">
											<div class="post-wrapper">
												<div class="post-wrapper d-flex align-items-end" style="background-image: url(<?php echo $image; ?>)">
													<div class="post-info-wrapper px-12 mb-12">
														<ul class="p-0 text-white mb-0"><li class="ms-6"><?php echo $date; ?></li></ul>
														<a href="<?php echo esc_url( $post_link ); ?>"><h3 class="text-white mb-0"><?php echo $post_title; ?></h3></a>
													</div>
												</div>
											</div>
										</div>
										<?php
									endif;
							endforeach;
							?>
						</div>
					</div>
				</section>

<?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
