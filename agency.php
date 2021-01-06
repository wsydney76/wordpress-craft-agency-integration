<?php

/**
 * Plugin Name: Agentur Integration
 */

use Elementor\Plugin;

/** *******************************************************************************
 * Register ACF Vita Block
 * *******************************************************************************/

add_action( 'acf/init', 'agency_acf_blocks_init' );
function agency_acf_blocks_init() {

	// Check PRO function exists.
	if ( function_exists( 'acf_register_block_type' ) ) {

		// https://www.advancedcustomfields.com/resources/acf_register_block_type/.
		acf_register_block_type( [
			'name'            => 'agency-vita',
			'title'           => 'Vita ACF Block',
			'description'     => 'Zeigt Vita einer Person an',
			'render_template' => plugin_dir_path( __FILE__ ) . '/blocks/render_acf_vita_block.php',
			'category'        => 'widgets'
		] );
	}
}

/** *******************************************************************************
 * Register Elementor Vita Widget
 * *******************************************************************************/

add_action( 'elementor/widgets/widgets_registered', 'agency_elementor_widgets' );
function agency_elementor_widgets() {
	require_once __DIR__ . '/elementor/Elementor_Vita_Widget.php';

	Plugin::$instance->widgets_manager->register_widget_type( new Elementor_Vita_Widget() );
}

/** *******************************************************************************
 * Register Shortcode
 * *******************************************************************************/

add_shortcode( 'vita', 'agency_render_vita' );

/** *******************************************************************************
 * Register Gutenberg Blocks
 * *******************************************************************************/
add_action( 'init', 'agency_gutenberg_blocks' );
function agency_gutenberg_blocks() {

	// automatically load dependencies and version
	$asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php' );

	wp_register_script(
		'gutenberg-vita-block',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version']
	);

	wp_register_style(
		'gutenberg-vita-styles',
		plugins_url( 'build/style-index.css', __FILE__ ),
		array( )
	);

	wp_register_style(
		'gutenberg-vita-editor-styles',
		plugins_url( 'build/style-index.css', __FILE__ ),
		array( 'wp-edit-blocks' )
	);

	register_block_type( 'agency/vita-block', [
		'apiVersion'      => 2,
		'style' => 'gutenberg-vita-styles',
		'editor_style' => 'gutenberg-vita-editor-styles',
		'editor_script'   => 'gutenberg-vita-block',
		'render_callback' => 'agency_render_vita'
	] );
}

/** *******************************************************************************
 * Register Default Render Function
 * *******************************************************************************/
function agency_render_vita( $attributes ) {
	require_once 'classes/Agency_Vita.php';
	$vita = new Agency_Vita();

	return $vita->get_vita( $attributes['slug'], $attributes['heading'] ?? '' );
}
