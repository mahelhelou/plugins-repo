<?php // WP Facebook Reaction Icons - Settings Page

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Display the plugin settings page
function wpfri_display_settings_page() {

  // check if user allowed to access
  if ( ! current_user_can( 'manage_options' ) ) return;
  ?>

  <div class="wrap">
    <h1><?php esc_html_e( 'WP Facebook Reaction Icons', 'wp-facebook-reaction-icons' ); ?></h1>
    <form action="options.php" method="post">

      <?php
      // output security fields
      settings_fields( 'wpfri_options' );

      // output setting sections
      do_settings_sections( 'wpfri' );

      // submit button
      submit_button();

      ?>
    </form>
  </div>

<?php } ?>