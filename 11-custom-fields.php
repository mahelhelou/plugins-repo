<?php // Custom Fields Plugin

/*
Plugin Name: Custom Fields
*/

// display all custom fields for each post
function myplugin_display_all_custom_fields( $content ) {
  /*
  get_post_custom(
    $post_id:integer
  )
  */

  $custom_fields = '<h3>Custom Fields</h3>';
  $all_custom_fields = get_post_custom(); // array of all custom fields attached to the post

  // each custom field is array
  foreach ( $all_custom_fields as $key => $array ) {
    foreach ( $array as $value ) {
      if ( '_' !== substr( $key, 0, 1 ) )
      $custom_fields .= '<div>'. $key .' => '. $value .'</div>';
    }
  }

  return $content . $custom_fields;
}

add_filter( 'the_content', 'myplugin_display_all_custom_fields' );

// display specific custom field for each post
function myplugin_display_specific_custom_fields( $content ) {

  /*
  get_post_meta(
    $post_id:integer,
    $key:string,
    $single:boolean
  )
  */

  $current_mode = get_post_meta( get_the_ID(), 'mood', true );
  $append_output = '<div>';
  $append_output .= esc_html__( 'Feeling ', 'myplugin' );
  $append_output .= sanitize_text_field( $current_mode );

  return $content . $append_output;
}

add_filter( 'the_content', 'myplugin_display_specific_custom_fields' );