<?php
/*
Plugin Name: Login Changer
*/

/**
 * Change header text
 */

add_action( 'login_header', 'hello_world' );
function hello_world() {
  echo 'Hello world!';
}

/**
 * Change login url
 */

add_filter( 'login_headerurl', 'change_login_url' );
function change_login_url( $url ) {
  $url = 'https://mahelhelou.com/courses';
  return $url;
}