<?php
/**
 * Gridiron Challenge Gridiron Tests.
 *
 * @since   0.0.0
 * @package Gridiron_Challenge
 */
class GC_Gridiron_Test extends WP_UnitTestCase {

	/**
	 * Test if our class exists.
	 *
	 * @since  0.0.0
	 */
	function test_class_exists() {
		$this->assertTrue( class_exists( 'GC_Gridiron') );
	}

	/**
	 * Test that we can access our class through our helper function.
	 *
	 * @since  0.0.0
	 */
	function test_class_access() {
		$this->assertInstanceOf( 'GC_Gridiron', gridiron()->gridiron' );
	}

	/**
	 * Test to make sure the CPT now exists.
	 *
	 * @since  0.0.0
	 */
	function test_cpt_exists() {
		$this->assertTrue( post_type_exists( 'gc-gridiron' ) );
	}

	/**
	 * Replace this with some actual testing code.
	 *
	 * @since  0.0.0
	 */
	function test_sample() {
		$this->assertTrue( true );
	}
}
