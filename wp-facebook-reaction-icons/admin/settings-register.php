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
    'wp-facebook-reaction-icons' // submenu slug
  );

  // All settings fields
  add_settings_field(
    'wpfri_status',
    __( 'Enable/Disable FB Reactions', 'wp-facebook-reaction-icons' ),
    'wpfri_callback_field_checkbox',
    'wp-facebook-reaction-icons',
    'wpfri_settings',
    [
      'id'    => 'wpfri_status',
      'label' => __( 'Turn plugin on or off', 'wp-facebook-reaction-icons' )
    ]
  );

  add_settings_field(
    'wpfri_reactions_position',
    __( 'Reactions Position', 'wp-facebook-reaction-icons' ),
    'wpfri_callback_field_radio',
    'wp-facebook-reaction-icons',
    'wpfri_settings',
    [
      'id'    => 'wpfri_reactions_position',
      'label' => __( 'Where you want to put the reactions in the page?' )
    ]
  );

  add_settings_field(
    'wpfri_icons_to_display',
    __( 'Reactions to Display', 'wp-facebook-reaction-icons' ),
    'wpfri_callback_field_icon_displayed',
    'wp-facebook-reaction-icons',
    'wpfri_settings',
    [
      'id'    => 'wpfri_icons_to_display',
      'label' => __( 'What icons you want to show your users?', 'wp-facebook-reaction-icons' )
    ]
  );

  add_settings_field(
    'wpfri_icons_size',
    __( 'Reaction Icons Size', 'wp-facebook-reaction-icons' ),
    'wpfri_callback_field_icon_sizes',
    'wp-facebook-reaction-icons',
    'wpfri_settings',
    [
      'id'    => 'wpfri_icons_size',
      'label' => __( 'What size of icons you want to apply?', 'wp-facebook-reaction-icons' )
    ]
  );

  add_settings_field(
    'wpfri_apply_on',
    __( 'Apply on', 'wp-facebook-reaction-icons' ),
    'wpfri_callback_field_checkbox_cpts',
    'wp-facebook-reaction-icons',
    'wpfri_settings',
    [
      'id'    => 'wpfri_apply_on',
      'label' => __( 'Choose where to apply WP Facebook Reaction Icons', 'wp-facebook-reaction-icons' )
    ]
  );

}

add_action( 'admin_init', 'wpfri_register_settings' );