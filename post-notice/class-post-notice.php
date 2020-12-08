<?php
// something

class PostNotice {

  public function __construct( $editor ) {
    // $editor->initialize();
  }

  public function initialize() {
    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
  }

  public function enqueue_styles() {
    wp_enqueue_style(
      'post-notice-admin-styles',
      plugins_url( 'post-notice/assets/css/admin.css' ),
      array(),
      null
    );
  }

  public function enqueue_scripts() {
    wp_enqueue_script(
      'post-notice-admin-scripts',
      plugins_url( 'post-notice/assets/js/admin.js' ),
      array( 'jquery' ),
      null,
      true
    );
  }
}