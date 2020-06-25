<?php
/*
Plugin Name: Collection Plugin
*/

/**
 * Create a plugin to capitalize words of post title
 * This plugin used a PHP ready function to capitalize every word in the titlle of post or page
 */

// add_filter( 'the_title', 'jw_modify_title_cb' ); // for all PHP versions
add_filter( 'the_title', function( $content ) {
  return ucwords( $content );
}); // 5.3 or higher

/**
 * Create a plugin to add content after the post content
 * Add filter to echo the time after each post's content
 */

add_filter( 'the_content', function( $content ) {
  // return $content . ' ' . 'I love blogging!';
  return $content . ' ' . time();
});

/**
 * Create a plugin to add message in the page footer
 * Add sentence to footer using add_action hook
 */

add_action( 'wp_footer', function() {
  echo 'Hello from the footer';
});

/**
 * Create a plugin to send email when a user comment on a post
 */

add_action( 'comment_post', function() {
  $email = get_bloginfo( 'admin_email' );
  // wp_mail( $to:string|array, $subject:string, $message:string, $headers:string|array, $attachments:string|array )
  wp_mail(
    $email,
    'New Comment Posted.',
    'A new comment has been lefe in your blog.'
  );
});

/**
 * Create a plugin to fetch categories posts and append all posts links to the current post if they are from the same categories
 */

add_filter( 'the_content', function( $content ) {
  // Get the id of current post
  $id = get_the_ID();

  // Apply this function only for single posts NOT pages
  if ( ! is_singular( 'post' ) ) {
    return $content;
  }

  // Retrieve categories you want to deal with
  $terms = get_the_terms( $id, 'category' );
  // print_r( $terms ); // use view source to get results styled
  $cats = array();

  // Loop all categories, and push every category to $cats array
  foreach ( $terms as $term ) {
    $cats[] = $term->term_id;
  }

  $cats_loop = new WP_Query( array(
    'posts_per_page'  => 3,
    'category__in'    => $cats,
    'orderby'         => 'rand',
    'post__not_in'    => array( $id ) // exclude current post
  ) );

  if ( $cats_loop->have_posts() ) {

    $content .=
      '<h2>You Also Might Like:</h2>
      <ul class="related-category-posts">';

    while ( $cats_loop->have_posts() ) {
      $cats_loop->the_post();

      $content .= '
        <li>
          <a href="' . get_permalink() . '">' . get_the_title() . '</a>
        </li>
      ';

    }

    $content .= '</ul>';
    wp_reset_query();
  }

  return $content;

});

/**
 * Create a plugin to add your twitter feed at the end of content using shortcode
 * Make sure that the user can pass twitter account username dynamically
 */

add_shortcode( 'twitter', function( $atts ) {
  // if ( ! isset( $atts['username'] ) ) $atts['username'] = 'mahelhelou';
  // if ( empty( $content ) ) $content = 'Follow me on Twitter';

  // Better way to set defaults
  $atts = shortcode_atts( array(
    'username'  => 'mahelhelou',
    'content'   => !empty( $content ) ? $content : 'Follow me on Twitter'
  ), $atts );

  // return 'Hi'; // don't use echo, because it will render first
  // return '<a href="http://twitter.com/' . $atts['username'] . '">Follow me on Twitter</a>';
  // return '<a href="http://twitter.com/' . $atts['username'] . '">' . $content . '</a>';

  extract( $atts );
  return "<a href='http://twitter.com/$username'>$content</a>";

  // print_r( $atts );
});