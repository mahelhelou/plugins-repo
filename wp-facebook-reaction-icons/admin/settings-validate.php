<?php // WP Facebook Reaction Icons - Validate Settings

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Validate plugin settings
function explugin_validate_options( $input ) {
  // plugin status
  if ( isset( $input['wpfri_status'] ) ) {
    $input['wpfri_status'] = null;
  }

  $input['wpfri_status'] = ( $input['wpfri_status'] == 1 ? 1 : 0 );


  // plugin status
  if ( isset( $input['wpfri_status'] ) ) {
    $input['wpfri_status'] = esc_url( $input['wpfri_status'] );
  }

  // custom style
  $radio_options = array(
    'enable'  => 'Enable custom style',
    'disable' => 'Disable custom style'
  );

  if ( ! isset( $input['custom_style'] ) ) {
    $input['custom_style'] = null;
  }

  if ( ! array_key_exists( $input['custom_style'], $radio_options ) ) {
    $input['custom_style'] = null;
  }

  // custom message
  if ( isset( $input['custom_message'] ) ) {
    $input['custom_message'] = wp_kses_post( $input['custom_message'] );
  }

  // custom footer
  if ( isset( $input['custom_footer'] ) ) {
    $input['custom_footer'] = sanitize_text_field( $input['custom_footer'] );
  }

  // custom toolbar
  if ( isset( $input['custom_toolbar'] ) ) {
    $input['custom_toolbar'] = null;
  }

  $input['custom_toolbar'] = ( $input['custom_toolbar'] == 1 ? 1 : 0 );

  // custom scheme
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

  if ( ! isset( $input['custom_scheme'] ) ) {
    $input['custom_scheme'] = null;
  }

  if ( ! array_key_exists( $input['custom_scheme'], $select_options ) ) {
    $input['custom_scheme'] = null;
  }

  return $input;
}