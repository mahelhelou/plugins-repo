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

  // reactions position
  $radio_options = array(
    'above_title'   => __( 'Above Post Title', 'wp-facebook-reaction-icons' ),
    'below_title'   => __( 'Below Post Title', 'wp-facebook-reaction-icons' ),
    'after_content' => __( 'After Post Content', 'wp-facebook-reaction-icons' )
  );

  if ( ! isset( $input['wpfri_reactions_position'] ) ) {
    $input['wpfri_reactions_position'] = null;
  }

  if ( ! array_key_exists( $input['wpfri_reactions_position'], $radio_options ) ) {
    $input['wpfri_reactions_position'] = null;
  }

  // icons size
  $radio_options = array(
    'small'   => __( 'Small', 'wp-facebook-reaction-icons' ),
    'medium'  => __( 'Medium', 'wp-facebook-reaction-icons' ),
    'large'   => __( 'Large', 'wp-facebook-reaction-icons' )
  );

  if ( ! isset( $input['wpfri_icons_size'] ) ) {
    $input['wpfri_icons_size'] = null;
  }

  if ( ! array_key_exists( $input['wpfri_icons_size'], $radio_options ) ) {
    $input['wpfri_icons_size'] = null;
  }
echo '111111111111111111111';
  echo $input['wpfri_icons_to_display'];
  exit;

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