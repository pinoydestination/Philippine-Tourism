<?php
/*
Plugin Name: WooCommerce - All in One SEO Pack
Plugin URI: http://www.visser.com.au/woocommerce/plugins/all-in-one-seo-pack/
Description: Manage All in One SEO Pack meta details for WooCommerce Products within the Add/Edit Products view within the WordPress Administration.
Version: 1.2
Author: Visser Labs
Author URI: http://www.visser.com.au/about/
License: GPL2
*/

load_plugin_textdomain( 'woo_ai', null, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

include_once( 'includes/functions.php' );

include_once( 'includes/common.php' );

$woo_ai = array(
	'filename' => basename( __FILE__ ),
	'dirname' => basename( dirname( __FILE__ ) ),
	'abspath' => dirname( __FILE__ ),
	'relpath' => basename( dirname( __FILE__ ) ) . '/' . basename( __FILE__ )
);

$woo_ai['prefix'] = 'woo_ai';
$woo_ai['name'] = __( 'All in One SEO Pack for WooCommerce', 'woo_ai' );
$woo_ai['menu'] = __( 'All in One SEO Pack', 'woo_ai' );
?>