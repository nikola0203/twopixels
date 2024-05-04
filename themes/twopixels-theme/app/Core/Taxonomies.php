<?php

namespace Awpt\Core;

/**
 * Use it to write your custom functions.s
 */
class Taxonomies
{
	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @return
	 */
	public function register() {
    add_action( 'init', [$this, 'register_taxonomy_mountains'] );
    add_filter( 'parent_file', [$this, 'highlight_active_menu_item'] );
	}

  public function register_taxonomy_mountains()
  {
    $labels = array(
      'name'                       => _x( 'Mountains', 'Mountain Name', 'awpt' ),
      'singular_name'              => _x( 'Mountain', 'Mountain Name', 'awpt' ),
      'menu_name'                  => __( 'Mountains', 'awpt' ),
      'all_items'                  => __( 'All Mountain', 'awpt' ),
      'parent_item'                => __( 'Parent Mountain', 'awpt' ),
      'parent_item_colon'          => __( 'Parent Mountain:', 'awpt' ),
      'new_item_name'              => __( 'New Mountain Name', 'awpt' ),
      'add_new_item'               => __( 'Add Mountain', 'awpt' ),
      'edit_item'                  => __( 'Edit Mountain', 'awpt' ),
      'update_item'                => __( 'Update Mountain', 'awpt' ),
      'view_item'                  => __( 'View Mountain', 'awpt' ),
      'separate_items_with_commas' => __( 'Separate Mountain with commas', 'awpt' ),
      'add_or_remove_items'        => __( 'Add or remove Mountains', 'awpt' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'awpt' ),
      'popular_items'              => __( 'Popular Mountains', 'awpt' ),
      'search_items'               => __( 'Search Mountains', 'awpt' ),
      'not_found'                  => __( 'Not Found', 'awpt' ),
      'no_terms'                   => __( 'No Mountains', 'awpt' ),
      'items_list'                 => __( 'Mountains list', 'awpt' ),
      'items_list_navigation'      => __( 'Mountains list navigation', 'awpt' ),
    );
    $args = array(
      'labels'            => $labels,
      'hierarchical'      => true,
      'public'            => true,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'mountains' ),
      'show_in_rest'      => true,
    );
    register_taxonomy( 'mountains', 'mountains', $args );
  }

  /**
   * Admin page for the 'services' taxonomy
   */
  public function services_taxonomy_admin_page()
  {
    $tax = get_taxonomy( 'mountains' );

    add_users_page(
      esc_attr( $tax->labels->menu_name ),
      esc_attr( $tax->labels->menu_name ),
      $tax->cap->manage_terms,
      'edit-tags.php?taxonomy=' . $tax->name
    );
  }

  /**
   * Update parent file name to fix the selected menu issue
   */
  public function highlight_active_menu_item( $parent_file )
  {
    global $submenu_file;

    if ( isset( $_GET['taxonomy'] ) && $_GET['taxonomy'] == 'mountains' && $submenu_file == 'edit-tags.php?taxonomy=mountains' ) {
      $parent_file = 'users.php';
    }

    return $parent_file;
  }
}