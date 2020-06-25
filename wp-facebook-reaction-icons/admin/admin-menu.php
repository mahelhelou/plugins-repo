<?php // WP Facebook Reaction Icons - Admin Menu

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Add top-level menu page
function wpfri_add_toplevel_menu() {
  add_menu_page(
    __( 'WP Facebook Reaction Icons Settings', 'wp-facebook-reaction-icons' ),
    __( 'WP Facebook Reactions', 'wp-facebook-reaction-icons' ),
    'manage_options',
    'wp-facebook-reaction-icons',
    'wpfri_display_settings_page'
  );

}

add_action( 'admin_menu', 'wpfri_add_toplevel_menu' );