<?php

namespace Awpt\Plugins;

/**
 * Register ACF Blocks.
 */
class AcfBlocks
{
	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @return
	 */
	public function register() 
	{
		add_action( 'init', array( $this, 'init_block_types' ) );
		add_filter( 'block_categories_all', array( $this, 'register_new_blocks_category' ), 10, 2 );
	}

	/**
	 * Return array of acf blocks settings
	 *
	 * @return array
	 */
	private function blocks_settings()
	{
		$blocks_dir = get_template_directory() . '/template-parts/blocks/';

		$blocks_settings = array(
			'advices'          => $blocks_dir . 'advices',
			'posts-categories' => $blocks_dir . 'posts-categories',
			'main-categories'  => $blocks_dir . 'main-categories',
			'popular-posts'    => $blocks_dir . 'popular-posts',
			'post-data'        => $blocks_dir . 'post-data',
			'post-plants'      => $blocks_dir . 'post-plants',
			'post-two-column'  => $blocks_dir . 'post-two-column',
			'post-share'       => $blocks_dir . 'post-share',
			'post-author'      => $blocks_dir . 'post-author',
			'newsletter'       => $blocks_dir . 'newsletter',
			'post-title-text'  => $blocks_dir . 'post-title-text',

		);

		return apply_filters( 'awpt_add_acf_block', $blocks_settings );
	}

	/**
	 * Register ACF blocks.
	 *
	 * @return void
	 */
	public function init_block_types()
	{
		if ( ! empty( $this->blocks_settings() ) ) {
			foreach ( $this->blocks_settings() as $block ) {
				register_block_type( $block );
			}
		}
	}

	/**
	 * Register ACF blocks category.
	 *
	 * @param array $block_categories
	 * @param string $editor_context
	 * @return array
	 */
	function register_new_blocks_category( $block_categories, $editor_context )
	{
		if ( ! empty( $editor_context->post ) ) {
			array_push(
				$block_categories,
				array(
					'slug'  => 'acf-blocks',
					'title' => __( 'ACF Blocks', 'awpt' ),
					'icon'  => 'admin-plugins',
				)
			);
		}

		return $block_categories;
	}
}
