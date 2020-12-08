<?php

function uwcc_checkbox_field_1_render() {

  $options = get_option( 'uwcc_settings', [] );

  $uwcc_checkbox_field_1 = isset( $options['uwcc_checkbox_field_1'] )
      ? (array) $options['uwcc_checkbox_field_1'] : [];
  ?>
  <input type='checkbox' name='uwcc_settings[uwcc_checkbox_field_1][]' <?php checked( in_array( 'Mastercard', $uwcc_checkbox_field_1 ), 1 ); ?> value='Mastercard'>
      <label>Mastercard</label>
  <input type='checkbox' name='uwcc_settings[uwcc_checkbox_field_1][]' <?php checked( in_array( 'Visa', $uwcc_checkbox_field_1 ), 1 ); ?> value='Visa'>
     <label>Visa</label>
  <input type='checkbox' name='uwcc_settings[uwcc_checkbox_field_1][]' <?php checked( in_array( 'Amex', $uwcc_checkbox_field_1 ), 1 ); ?> value='Amex'>
     <label>Amex</label>
  <?php

}

checked( $options['uwcc_checkbox_field_1'], Mastercard )   // bad
checked( $options['uwcc_checkbox_field_1'], 'Mastercard' ) // good

checked( in_array( Mastercard, $uwcc_checkbox_field_1 ), 1 )   // bad
checked( in_array( 'Mastercard', $uwcc_checkbox_field_1 ), 1 ) // good