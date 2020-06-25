<?php
/*
Plugin Name: Idea Pro Example
Description: A very basic plugin for learning purposes
Version: 1.0
Author: Mahmoud El Helou
Author URI: http://mahelhelou.com
*/

/**
 * Add shortcode to add content after $the_content of post/page
 */
function idea_pro_example_function() {
  $content  =   '<h5>This is a very basic plugin</h5>';
  $content  .=  '<div>A div of content goes here</div>';
  $content  .=  '<p>This is a block of paragraph</p>';

  // print $content; // return content BEFORE $the_content for post/page
  return $content; // return content AFTER $the_content for post/page
}

add_shortcode( 'example', 'idea_pro_example_function' );

/**
 * Try to make every edit or function as a plugin, because you'll continue use the plugin regardless the theme you chose
 * Also you can use the plugin for other websites
 * And of course, if the plugin is broken, visitors will continue use your website without any Fatal Error
 */

/**
 * Add a menu page to allow user add header and footer scripts for third-party analytics such as Google analytics
 */

function idea_pro_admin_menu_option() {
  // 1. Add the name and meta of the menu page
  add_menu_page( 'Header & Footer Scripts', 'Site Scripts', 'manage_options', 'idea-pro-admin-menu', 'idea_pro_scripts_page', '', 200 );
}

function idea_pro_scripts_page() {
  // 2. Read database and render initial scripts
  $header_scripts   = get_option( 'idea_pro_header_scripts', 'NONE!' );
  $footer_scripts   = get_option( 'idea_pro_footer_scripts', 'NONE!' );

  // 3. Callback function to render the output
  ?>

  <div class="wrap">
    <h2>Update scripts for header & footer.</h2>
    <form method="POST" action="">
      <label for="header_scripts">Header Scripts</label>
      <textarea name="header_scripts" class="large-text"><?php echo $header_scripts; ?></textarea>
      <label for="footer_scripts">Footer Scripts</label>
      <textarea name="footer_scripts" class="large-text"><?php echo $footer_scripts; ?></textarea>
      <input class="button button-primary" type="submit" name="submit_scripts_update" value="Update Settings">
    </form>
  </div>
<?php }

add_action( 'admin_menu', 'idea_pro_admin_menu_option' );