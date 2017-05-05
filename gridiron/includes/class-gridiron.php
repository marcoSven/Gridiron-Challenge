<?php
/**
 * Gridiron Challenge Gridiron.
 *
 * @since   0.0.0
 * @package Gridiron_Challenge
 */


/**
 * Gridiron Challenge Gridiron post type class.
 *
 * @since 0.0.0
 *
 */
class GC_Gridiron  {
	/**
	 * Parent plugin class.
	 *
	 * @var Gridiron_Challenge
	 * @since  0.0.0
	 */
	protected $plugin = null;

	/**
	 * Constructor.
	 *
	 * Register Custom Post Types.
	 *
	 *
	 * @since  0.0.0
	 *
	 * @param  Gridiron_Challenge $plugin Main plugin object.
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();
	}

	/**
	 * Initiate our hooks.
	 *
	 * @since  0.0.0
	 */
	public function hooks() {
		register_post_type( 'gridiron', array(
			'public' => true,
			'label'  => 'Gridiron',
			'has_archive' => true,
			'menu_position' => 15,
			'menu_icon' => 'dashicons-grid-view',
			'supports' => array( 'title', 'editor', 'custom-fields' ),
			'rewrite' => array( 'slug' => 'gridiron', 'with_front' => false ),
			'taxonomies' => array( 'gridlines' )
			));
	}
}
