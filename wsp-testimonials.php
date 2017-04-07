<?php
/**
 * Plugin Name: WSP Testimonials
 * Version: 0.0.4
 * Plugin URI: http://www.onthemapmarketing.com/
 * Description: A Testimonial fallback plugin for WP-Schema-Plugin
 * Author: On The Map Marketing
 * Author URI: http://www.onthemapmarketing.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: wsp-testimonials
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author On The Map Marketing
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;
// Load plugin class files
require_once( 'includes/class-wsp-testimonials.php' );
require_once( 'includes/class-wsp-testimonials-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/wsp-testimonials-shortcode.php' );
require_once( 'includes/lib/class-wsp-testimonials-admin-api.php' );
require_once( 'includes/lib/class-wsp-testimonials-post-type.php' );
require_once( 'includes/lib/wsp-testimonials-meta.php' );
// require_once( 'includes/lib/class-wsp-testimonials-taxonomy.php' );

/**
 * Returns the main instance of wsp_testimonials to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object wsp_testimonials
 */
function wsp_testimonials () {
	// if(!is_plugin_active('/wp-schema-plugin/wp-schema-plugin.php')){

		$instance = wsp_testimonials::instance( __FILE__, '0.0.4' );

		if ( is_null( $instance->settings ) ) {
			$instance->settings = wsp_testimonials_Settings::instance( $instance );
		}

		return $instance;
	// }
}

// add_action( 'admin_init', 'wsp_testimonials' );
wsp_testimonials();
wsp_testimonials()->register_post_type( 'wsp_testimonials', __( 'Testimonials', 'wsp-testimonials' ), __( 'Testimonials', 'wsp-testimonials' ) );
