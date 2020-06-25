<?php // WP Facebook Reaction Icons - Settings Callbacks

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Callback: login section
function wpfri_callback_section_settings() {
  echo '<p>These settings enable you to customize WP facebook reactions icons.</p>';
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
function explugin_callback_field_radio( $args ) {
  $options = get_option( 'explugin_options', explugin_options_default() );

  $id     = isset( $args['id'] ) ? $args['id'] : '';
  $label  = isset( $args['label'] ) ? $args['label'] : '';

  $selected_option  = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

  $radio_options = array(
    'enable'  => 'Enable custom style',
    'disable' => 'Disable custom style'
  );

  foreach ( $radio_options as $value => $label ) {
    $checked = checked( $selected_option === $value, true, false );

    echo '<label><input name="explugin_options['. $id .']" type="radio" value="'. $value .'"' . $checked .'>';
    echo '<span>'. $label .'</span></label><br />';
  }
}



// Callback: select field
function explugin_callback_field_select( $args ) {
  $options = get_option( 'explugin_options', explugin_options_default() );

  $id     = isset( $args['id'] ) ? $args['id'] : '';
  $label  = isset( $args['label'] ) ? $args['label'] : '';

  $selected_option  = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

  $select_options = array(
    'default'   => 'Default',
    'light'     => 'Light',
    'blue'      => 'Blue',
    'coffee'    => 'Coffee',
    'ectoplasm' => 'Ectoplasm',
    'midnight'  => 'Midnight',
    'ocean'     => 'Ocean',
    'sunrise'   => 'Sunrise'
  );

  echo '<select id="explugin_options_'. $id .'" name="explugin_options['. $id .']">';

  foreach ( $select_options as $value => $option ) {
    $selected = selected( $selected_option === $value, true, false );

    echo '<option value="'. $value .'"' . $selected .'>'. $option .'</option>';
  }
  echo '</select> <label for="explugin_options_'. $id .'">'. $label .'</label>';
}