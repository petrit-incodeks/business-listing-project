<?php

/*
Plugin Name: AIT Easy Admin
Plugin URI: http://www.ait-themes.club
Description: Simplified Wordpress administration
Version: 1.13
Author: AitThemes.Club
Author URI: http://ait-themes.club
Text Domain: ait-easy-admin
Domain Path: /languages
License: GPLv2 or later
*/


/* trunk@r340 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

require('functions/defaultFunctions.php');

require('functions/adminOptionsPage.php');

define( "EASY_ADMIN_PLUGIN_URL", plugin_dir_path( __FILE__ ));

register_activation_hook( __FILE__, 'easyAdminActivation' );

global $easyAdminSettings;

$easyAdminSettings = get_option('ait_easy_admin_settings');

add_action( 'plugins_loaded', 'ait_easyadmin_textdomain' );

function ait_easyadmin_textdomain() {
    $ret = load_plugin_textdomain( 'ait-easyadmin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}


/*add_action('add_meta_boxes', 'aitRemoveSeoMeta', 99);
function aitRemoveSeoMeta(){
    if (!current_user_can('activate_plugins')) {
        remove_meta_box('wpseo_meta', 'ait-item', 'normal');
    }
}*/

