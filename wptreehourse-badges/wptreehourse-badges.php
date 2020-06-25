<?php
// 1. Plugin header
/*
Plugin Name: Official Treehouse Badges Plugin
*/

// 2. Callback function for a hook
/**
 * Add a link for the plugin page in the admin menu
 * Under Settings -> Treehouse Badges
 */
function wptreehouse_badges_menu() {
  /**
   * Use the add_options_page function
   * add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function, $position )
   */

  add_options_page(
    'Official Treehouse Badges Plugin',
    'Treehouse Badges',
    'manage_options',
    'wptreehouse_badges',
    'wptreehouse_badges_options_page'
  );
}

add_action( 'admin_menu', 'wptreehouse_badges_menu' );

// 3. Callback function when the plugin is activated properly
function wptreehouse_badges_options_page() {
  // 4. Test for the right permissions
  if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( 'You do not have sufficient permissions to access this page' );
  }

  // echo '<h3>Welcome to our plugin page</h3>';
  require( 'inc/options-page-wrapper.php' );
}

// When designing the plugin's page, it's best to use the markup WorPress uses