<?php
/*
Plugin Name: Security of plugins
*/

// Validating phone number
function myplugin_is_phone_number( $phone_number ) {
  // Check if empty
  if ( empty( $phone_number ) ) return false;

  // Check format
  if ( ! preg_match('/^[0-9\-\(\)\/\+\s]*$/', $phone_number) ) return false;

  // All good
  return true;
}

// Display form
function myplugin_form_phone_number() { ?>

  <form method="POST" action="">
    <p><label for="phone">Please enter your phone number</label></p>
    <p><input type="tel" id="phone" name="myplugin-phone-number"></p>
    <p><input type="submit" value="Submit Form"></p>
  </form>

<?php }

// Process submitted form
function myplugin_process_phone_number() {
  if ( isset( $_POST['myplugin-phone-number'] ) ) {
    $phone_number = $_POST['myplugin-phone-number'];

    if ( myplugin_is_phone_number( $phone_number ) ) {
      echo '<p>Thanks for your phone number</p>';
    } else {
      echo '<p>Please enter a valid phone number</p>';
    }
  }
}