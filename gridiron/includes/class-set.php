<?php
/**
 * Gridiron Challenge Set.
 *
 * @since   0.0.0
 * @package Gridiron_Challenge
 */

/**
 * Gridiron Challenge Set.
 *
 * @since 0.0.0
 */
class GC_Set {
	/**
	 * Parent plugin class.
	 *
	 * @since 0.0.0
	 *
	 * @var   Gridiron_Challenge
	 */
	protected $plugin = null;

	/**
	 * Constructor.
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
		add_action( 'archive_template', array( $this, 'gridiron_template' ) );
	}
	// Gridiron Template

	public function gridiron_template( $archive_template ) {
		global $post;

		if ( is_post_type_archive ('gridiron') ) {
			$archive_template = dirname(dirname( __FILE__ )) . '/template/challenge.php';
		}
		return $archive_template;
	}

	public function create_irons() {

		// Create our Gridiron yardlines

		$irons = array ('010','020','030','040','050','060','070','080','090','100');

		foreach ( $irons as $iron ) {

			$new_iron = array(
			  'post_title'   => $iron,
			  'post_content' => 'Ten Yards',
			  'post_date' => date('Y-m-d', time() - 60 * 60 * 24),
			  'post_type' => 'gridiron',
			  'post_status'  => 'publish',
			  'post_author'  => get_current_user_id(),
			);

			wp_insert_post( $new_iron );
		}

	}
}
