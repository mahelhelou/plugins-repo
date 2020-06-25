<?php
/*
Plugin Name: WP Facebook Reaction Icons
Description: An easy way to add interaction emojis in your site.
Author: Mahmoud El Helou
Version: 1.0
Text Domain: wp-facebook-reactions-icons
Domain Path: /languages
License: GPLv2 or later
License URL: https://gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load text domain
function wpfri_load_textdomain() {
  load_plugin_textdomain( 'wp-facebook-reaction-icons', false, plugin_dir_path(  __FILE__ ) . '/languages' );
}

add_action( 'plugins_loaded', 'wpfri_load_textdomain' );

// Include admin-only dependencies
if ( is_admin() ) {
  require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';
}

// Include dependencies: admin and public
// something goes here

// Default plugin options
function wpfri_options_default() {
  return array(
    'wpfri_status'      => 'true',
    
  );
}

// Remove options on uninstall
function wpfri_on_uninstall() {
  if ( ! current_user_can( 'activate_plugins' ) ) return;

  delete_option( 'wpfri_options' );
}

register_uninstall_hook( __FILE__, 'wpfri_on_uninstall' );