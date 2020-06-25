<?php
/*
Plugin Name: Activation / Deactivate
*/

// Do stuff on activation
function myplugin_on_activation() {
  if ( ! current_user_can( 'activate_plugins' ) ) return;

  // You can search about these options in wp-options table
  add_option( 'myplugin_posts_per_page', 10 );
  add_option( 'myplugin_show_welcome_page', true );
}

register_activation_hook( __FILE__, 'myplugin_on_activation' );

// Do stuff on deactivation
function myplugin_on_deactivation() {
  if ( ! current_user_can( 'activate_plugins' ) ) return;

  // View a message on plugin deactivation
  // wp_die( 'Your plugin has been deactivated' );

  flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'myplugin_on_deactivation' );

// Do stuff on uninstall
function myplugin_on_uninstall() {
  if ( ! current_user_can( 'activate_plugins' ) ) return;

  // Remove these options from wp-options table
  delete_option( 'myplugin_posts_per_page' );
  delete_option( 'myplugin_show_welcome_page' );
}

register_uninstall_hook( __FILE__, 'myplugin_on_uninstall' );
