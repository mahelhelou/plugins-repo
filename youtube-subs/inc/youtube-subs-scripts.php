<?php

// Add scripts to the plugin
function yts_assets_enqueue() {
  // Load CSS
  wp_enqueue_style( 'yts-main-styles', plugins_url( 'youtube-subs/css/styles.css' ) );

  // Load JS
  wp_enqueue_script( 'yts-main-scripts', plugins_url( 'youtube-subs/js/scripts.js' ) );
}

add_action( 'wp_enqueue_scripts', 'yts_assets_enqueue' );