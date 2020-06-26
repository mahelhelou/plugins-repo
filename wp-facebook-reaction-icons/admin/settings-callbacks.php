<?php // WP Facebook Reaction Icons - Settings Callbacks

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Callback: section settings
function wpfri_callback_section_settings() {
  echo '<p>These settings enable you to customize WP facebook reaction icons.</p>';
}

// Callback: checkbox field
function wpfri_callback_field_checkbox( $args ) {
  $options = get_option( 'wpfri_options', wpfri_options_default() );

  $id     = isset( $args['id'] ) ? $args['id'] : '';
  $label  = isset( $args['label'] ) ? $args['label'] : '';

  $checked  = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';

  echo '<input id="wpfri_options_' . $id .'" name="wpfri_options['. $id .']" type="checkbox" value="1"'. $checked .'>';
  echo '<label for="wpfri_options_'. $id .'">'. $label .'</label>';
}

// Callback: radio field
function wpfri_callback_field_radio( $args ) {
  $options = get_option( 'wpfri_options', wpfri_options_default() );

  $id     = isset( $args['id'] ) ? $args['id'] : '';
  $label  = isset( $args['label'] ) ? $args['label'] : '';

  $selected_option  = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

  $radio_options = array(
    'above_title'   => __( 'Above Post Title', 'wp-facebook-reaction-icons' ),
    'below_title'   => __( 'Below Post Title', 'wp-facebook-reaction-icons' ),
    'after_content' => __( 'After Post Content', 'wp-facebook-reaction-icons' )
  );

  foreach ( $radio_options as $value => $label ) {
    $checked = checked( $selected_option === $value, true, false );

    echo '<label><input name="wpfri_options['. $id .']" type="radio" value="'. $value .'"' . $checked .'>';
    echo '<span>'. $label .'</span></label><br />';
  }
}

// Callback: radio field - icon sizes
function wpfri_callback_field_icon_sizes( $args ) {
  $options = get_option( 'wpfri_options', wpfri_options_default() );

  $id     = isset( $args['id'] ) ? $args['id'] : '';
  $label  = isset( $args['label'] ) ? $args['label'] : '';

  $selected_option  = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

  $radio_options = array(
    'small'   => __( 'Small', 'wp-facebook-reaction-icons' ),
    'medium'  => __( 'Medium', 'wp-facebook-reaction-icons' ),
    'large'   => __( 'Large', 'wp-facebook-reaction-icons' )
  );

  foreach ( $radio_options as $value => $label ) {
    $checked = checked( $selected_option === $value, true, false );

    echo '<label><input name="wpfri_options['. $id .']" type="radio" value="'. $value .'"' . $checked .'>';
    echo '<span>'. $label .'</span></label><br />';
  }
}



// Callback: checkbox field - post types
function wpfri_callback_field_radio( $args ) {
  $options = get_option( 'wpfri_options', wpfri_options_default() );

  $id     = isset( $args['id'] ) ? $args['id'] : '';
  $label  = isset( $args['label'] ) ? $args['label'] : '';

  $selected_option  = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

  $radio_options = array(
    'above_title'   => __( 'Above Post Title', 'wp-facebook-reaction-icons' ),
    'below_title'   => __( 'Below Post Title', 'wp-facebook-reaction-icons' ),
    'after_content' => __( 'After Post Content', 'wp-facebook-reaction-icons' )
  );

  foreach ( $radio_options as $value => $label ) {
    $checked = checked( $selected_option === $value, true, false );

    echo '<label><input name="wpfri_options['. $id .']" type="radio" value="'. $value .'"' . $checked .'>';
    echo '<span>'. $label .'</span></label><br />';
  }
}