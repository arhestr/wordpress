<?php
/**
 * Plugin Name: WooCommerce
 * Plugin URI: https://woocommerce.com/
 * Description: An eCommerce toolkit that helps you sell anything. Beautifully.
 * Version: 3.3.3
 * Author: Automattic
 * Author URI: https://woocommerce.com
 *
 * Text Domain: woocommerce
 * Domain Path: /i18n/languages/
 *
 * @package WooCommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define WC_PLUGIN_FILE.
if ( ! defined( 'WC_PLUGIN_FILE' ) ) {
	define( 'WC_PLUGIN_FILE', __FILE__ );
}

// Include the main WooCommerce class.
if ( ! class_exists( 'WooCommerce' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-woocommerce.php';
}

/**
 * Main instance of WooCommerce.
 *
 * Returns the main instance of WC to prevent the need to use globals.
 *
 * @since  2.1
 * @return WooCommerce
 */
function wc() {
	return WooCommerce::instance();
}

function getParentCategories() {
    global $wpdb;
    $sql = "SELECT term_id as id, name, slug FROM wp_terms where term_id in (SELECT term_id FROM wp_term_taxonomy where parent = 0 and taxonomy = 'category') order by name asc";
    $parents = $wpdb->get_results( $sql );
    var_dump($parents[0]);
    return $parents;
}
add_shortcode( 'getParentCategories', 'getParentCategories' );

// Global for backwards compatibility.
$GLOBALS['woocommerce'] = wc();
