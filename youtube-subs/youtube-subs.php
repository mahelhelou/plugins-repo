<?php
/*
Plugin Name: Youtube Subscribe Plugin
*/

/**
 * Prevent accessing the plugin file directly by going to 'http://korsati.local/wp-content/plugins/youtube-subs/youtube-subs.php'
 * This is a security issue
 */

// echo 'I am accessed directly'; // will be echo-ed if you don't put security in mind

if ( ! defined( 'ABSPATH' ) ) {
  die( '<h1>Hey! What are you ding here? You are not allowd to enter this page...</h1>' );
  // exit; // blank page
}

// Load scripts file
require_once( plugin_dir_path( __FILE__ ) . '/inc/youtube-subs-scripts.php' );