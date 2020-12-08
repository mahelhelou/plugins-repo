<?php // User and Roles Plugin

/*
Plugin Name: Users and Roles
*/

/**
 * Use this plugin as a demo to update and delete users
 */

// Adding top-level menu page
add_action( 'admin_menu', 'create_user_add_toplevel_menu' );

function create_user_add_toplevel_menu() {
  add_menu_page(
    esc_html__( 'Users and Roles: Create User', 'myplugin' ),
    esc_html__( 'Create Users', 'myplugin' ),
    'manage_options',
    'create-user',
    'create_user_display_settings_page',
    'dashicons-admin-generic',
    null
  );
}

// Display plugin settings page
function create_user_display_settings_page() {
  // check if user isallowed to access
  if ( ! current_user_can( 'manage_options' ) ) return; ?>

  <div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form method="post">
      <h3><?php esc_html_e( 'Add New User', 'myplugin' ); ?></h3>
      <p>
        <label for="username"><?php esc_html_e( 'Username', 'myplugin' ); ?></label><br>
        <input type="text" class="regular-text" size="40" id="username" name="username">
      </p>
      <p>
        <label for="email"><?php esc_html_e( 'Email', 'myplugin' ); ?></label><br>
        <input type="email" class="regular-text" size="40" id="email" name="email">
      </p>
      <p>
        <label for="password"><?php esc_html_e( 'Password', 'myplugin' ); ?></label><br>
        <input type="password" class="regular-text" size="40" id="password" name="password">
      </p>

      <p><?php esc_html_e( 'The user will receive information via email', 'myplugin' ); ?></p>

      <!-- important field for plugin to work -->
      <input type="hidden" name="myplugin-nonce" value="<?php echo wp_create_nonce( 'myplugin-nonce' ); ?>">
      <input type="submit" class="button button-primary" value="<?php esc_html_e( 'Add User', 'myplugin' ); ?>">
    </form>
  </div>


<?php }

// Add new user
function create_user_add_user() {
  // check if nonce is valid
  if ( isset( $_POST['myplugin-nonce'] ) && wp_verify_nonce( $_POST['myplugin-nonce'], 'myplugin-nonce' ) ) {

    // check if user is allowed
    if ( ! current_user_can( 'manage_options' ) ) wp_die();

    // get submitted username
    if ( isset( $_POST['username'] ) && ! empty( $_POST['username'] ) ) {
      $username = sanitize_user( $_POST['username'] );
    } else {
      $username = '';
    }

    // get submitted email
    if ( isset( $_POST['email'] ) && ! empty( $_POST['email'] ) ) {
      $email = sanitize_email( $_POST['email'] );
    } else {
      $email = '';
    }

    // get submitted password
    if ( isset( $_POST['password'] ) && ! empty( $_POST['password'] ) ) {
      $password = $_POST['password']; // sanitized by wp_create_user()
    } else {
      $password = wp_generate_password(); // accepts params
    }

    // set user_id variable
    $user_id = ''; // default

    // check if user exists
    $username_exists = username_exists( $username );
    $email_exists = email_exists( $email );

    if ( $username_exists || $email_exists ) {
      $user_id = esc_html__( 'The user already exists.', 'myplugin' );
    }

    // check non-empty values
    if ( empty( $username ) || empty( $email ) ) {
      $user_id = esc_html__( 'Required: username and password.', 'myplugin' );
    }

    // create the user
    if ( empty( $user_id ) ) {
      $user_id = wp_create_user( $username, $password, $email );

      // check if error on creating user
      if ( is_wp_error( $user_id ) ) {
        $user_id = $user_id->get_error_message();
      } else {
        // email password if success
        $subject = __( 'Welcome to WordPress', 'myplugin' );
        $message = __( 'You are now allowed to share content on our website', 'myplugin' );

        wp_mail( $email, $subject, $message );
      }

      $location = admin_url( 'admin.php?page=myplugin&result='. urlencode( $user_id ) );
      wp_redirect( $location );

      exit;

    }
  }
}

add_action( 'admin_init', 'create_user_add_user' );