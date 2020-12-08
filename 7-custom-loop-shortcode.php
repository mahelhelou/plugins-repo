<?php
/*
Plugin Name: Custom Loop Shortcode
*/

/**
 * Customize wordpress loop using this plugin
 * Use $atts of posts_per_pages and orderby
 */

// Custom loop shortcode: get_posts_example
function custom_loop_shortcode_get_posts( $atts ) {
  // get global post variable
  global $post;

  // define shortcode variables (default)
  extract( shortcode_atts( array(
    'posts_per_page'  => 5,
    'orderby'         => 'date'
  ), $atts ) );


  // define get_post parameters
  $args = array(
    'posts_per_page'  => $posts_per_page,
    'orderby'         => $orderby
  );

  // get the posts
  $posts = get_posts( $args );

  // output the posts
  $output   = '<h3>Custom Loop Example: get_posts()</h3>';
  $output   .= '<ul>';

  // loop through posts
  foreach ( $posts as $post ) {
    // setup post data
    setup_postdata( $post );

    // continue output variable
    $output   .= '<li><a href="'. get_permalink() .'">'. get_the_title() .'</a></li>';
  }

  // complete output variable
  $output   .= '</ul>';

  // reset post data
  wp_reset_postdata();

  // return output
  return $output;

}

add_shortcode( 'get-posts-example', 'custom_loop_shortcode_get_posts' );