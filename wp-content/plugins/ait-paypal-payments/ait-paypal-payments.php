<?php
/*
Plugin Name: AIT PayPal Payments
Version: 1.7
Description: Adds PayPal gateway to Directory type themes

Author: AitThemes.Club
Author URI: http://ait-themes.club
Text Domain: ait-paypal-payments
Domain Path: /languages
*/

/* trunk@r155 */

defined('ABSPATH') or die();
define('AIT_PAYPAL_PAYMENTS_ENABLED', true);
include_once(dirname(__FILE__).'/load.php');

add_action('after_setup_theme', function() {
	try {
		define('AIT_PAYPAL_LISTENER_URL', plugin_dir_url(__FILE__).'listener.php');
		AitPaypal::getInstance();
	} catch (Exception $e) {
		AitPaypal::error($e);
	}
});

register_activation_hook(__FILE__, function(){
	paypalPaymentsCheckCompatibility(true);
	AitCache::clean();
});
add_action('after_switch_theme', function(){
	paypalPaymentsCheckCompatibility();
});

add_action('plugins_loaded', function() {
	load_plugin_textdomain('ait-paypal-payments', false, dirname(plugin_basename( __FILE__ )) . '/languages');
}, 11);

function paypalPaymentsCheckCompatibility($die = false){
	if ( !defined('AIT_THEME_TYPE') ){	// directory themes
		require_once(ABSPATH . 'wp-admin/includes/plugin.php' );
		deactivate_plugins(plugin_basename( __FILE__ ));
		if($die){
			wp_die('Current theme is not compatible with PayPal Payments plugin :(', '',  array('back_link'=>true));
		} else {
			add_action( 'admin_notices', function(){
				echo "<div class='error'><p>" . __('Current theme is not compatible with PayPal Payments plugin!', 'ait-paypal-payments') . "</p></div>";
			} );
		}
	}
}