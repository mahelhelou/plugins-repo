<?php
/*
Plugin Name: Pluggable functions
*/

/**
 * This function is copied from pluggale.php file from wp-includes
 * Another way to customize wordpress other than using actions and hooks
 * The original function wrapped with if(), but in customization ignore iifs
 * Log the current user out.
 */

/**
 * You can rename the wp-readyfunctions' names
 * Pluggable functions are extremely customizable
 */
function wp_logout() {
	wp_destroy_current_session();
	wp_clear_auth_cookie();
	wp_set_current_user( 0 );
	myplugin_custom_logout();

	/**
	 * Fires after a user is logged-out.
	 */
	do_action( 'wp_logout' );
}

// Customize logout function
function myplugin_custom_logout() {

	// Do something when user logout

}

// Firing up the function once -> for one hook not for two
// Because we called the plugin into copied one, no need for action
// add_action( 'wp_logout', 'myplugin_custom_logout' );