<?php // WP Facebook Reaction Icons - Register Settings

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register plugin settings
function wpfri_register_settings() {

  register_setting(
    'wpfri_options', // match settings fields
    'wpfri_options', // db name
    'wpfri_callback_validate_options'
  );

  // Facebook reactions options
  add_settings_section(
    'wpfri_settings',
    __( 'Facebook Reactions Settings', 'wp-facebook-reaction-icons' ),
    'wpfri_callback_section_settings',
    'wpfri' // submenu slug
  );

  // All settings fields
  add_settings_field(
    'wpfri_status',
    __( 'Enable/Disable FB Reactions', 'wp-facebook-reaction-icons' ),
    'wpfri_callback_field_checkbox',
    'wpfri',
    'wpfri_settings',
    [
      'id'    => 'status',
      'label' => __( 'Turn plugin on or off', 'wp-facebook-reaction-icons' )
    ]
  );

  add_settings_field(
    'reactions_position',
    __( 'Reactions position', 'wp-facebook-reaction-icons' ),
    'wpfri_callback_field_text',
    'wpfri',
    'wpfri_section_login',
    [
      'id'    => 'custom_title',
      'label' => __( 'Custom title attribute for the logo link', 'wpfri' )
    ]
  );

  add_settings_field(
    'custom_style',
    __( 'Custom Style', 'wpfri' ),
    'wpfri_callback_field_radio',
    'wpfri',
    'wpfri_section_login',
    [
      'id'    => 'custom_style',
      'label' => __( 'Custom CSS for login screen', 'wpfri' )
    ]
  );

  add_settings_field(
    'custom_message',
    __( 'Custom Message', 'wpfri' ),
    'wpfri_callback_field_textarea',
    'wpfri',
    'wpfri_section_login',
    [
      'id'    => 'custom_message',
      'label' => __( 'Custom text and/or markup', 'wpfri' )
    ]
  );

  add_settings_field(
    'custom_footer',
    __( 'Custom Footer', 'wpfri' ),
    'wpfri_callback_field_text',
    'wpfri',
    'wpfri_section_admin',
    [
      'id'    => 'custom_footer',
      'label' => __( 'Custom footer text', 'wpfri' )
    ]
  );

  add_settings_field(
    'custom_toolbar',
    __( 'Custom Toolbar', 'wpfri' ),
    'wpfri_callback_field_checkbox',
    'wpfri',
    'wpfri_section_admin',
    [
      'id'    => 'custom_toolbar',
      'label' => __( 'Remove new post and comment links from the toolbar', 'wpfri' )
    ]
  );

  add_settings_field(
    'custom_scheme',
    __( 'Custom Scheme', 'wpfri' ),
    'wpfri_callback_field_select',
    'wpfri',
    'wpfri_section_admin',
    [
      'id'    => 'custom_scheme',
      'label' => __( 'Default color scheme for new users', 'wpfri' )
    ]
  );

}

add_action( 'admin_init', 'wpfri_register_settings' );