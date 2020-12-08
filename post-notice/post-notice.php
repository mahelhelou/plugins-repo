<?php
/*
Plugin Name: Post Notice
*/

// Exit if accessed directly
/* if ( ! defined( 'WPINC' ) ) {
  die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-post-notice-editor.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-post-notice.php' );


// Instance of class PostNotice
function post_notice_start() {
  $post_editor = new PostNoticeEditor;

  $post_notice = new PostNotice( $editor );
  $post_notice->initialize();
}

post_notice_start(); */