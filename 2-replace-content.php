<?php
/*
Plugin Name: Replace Content
*/

function fix_spelling( $content ) {
  str_replace( 'WordPress', 'Wordpress', $content );
  $content .= "<hr/>Thank you for watching this video tutorial.";
  return $content;
}

add_filter( 'the_content', 'fix_spelling' );