<?php

/**
 * Filters the submit buttons.
 * Replaces the forms <input> buttons with <button>.
 *
 * @param string $button Contains the <input> tag to be filtered.
 * @param object $form Contains all the properties of the current form.
 *
 * @return string The filtered button.
 */
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
  return '<button class="button gform_button" id="gform_submit_button_' . $form["id"] . '"><span class="button-label">' . $form['button']['text'] . '</span></button>';
}


/** Change gravity forms zip field to tel fields
 * @link https://mrdif.com/override-gravity-forms-field-type-show-mobile-telephone-keypad/
 **/
//if (!is_admin() && wp_is_mobile()) {
//  $gfields = get_field('gf_mobile_num', 'option');
//
//  if (!empty($gfields)) {
//    foreach($gfields as & $gf_field) {
//
//      add_filter( 'gform_field_input_' . $gf_field['form_id'] . '_' . $gf_field['field_id'], function ( $input, $field, $value, $entry_id, $form_id ) use ($gf_field) {
//        if ( $form_id == $gf_field['form_id'] && $field->id == $gf_field['field_id'] ) {
//
//          $required = $field['isRequired'] === true ? 'true' : 'false';
//          $type = $field['type'] ? '_' . $field['type'] : '';
//          $inputType = $field['inputType'] ? '_' . $field['inputType'] : '';
//          $container = $type ?? '_' . $type;
//
//          $input = '<div class="ginput_container ginput_container' . $type . $inputType . '">';
//
//          $input = $input . '<input id="input_' . $gf_field['form_id'] . '_' . $gf_field['field_id'] . '" class="' . $field['size'] . '" tabindex="4" name="input_' . $gf_field['field_id'] . '" step="1" placeholder="' . $field['placeholder'] . '" type="tel" value="' . $field['defaultValue'] . '" aria-required="' . $required . '" aria-invalid="false" />';
//
//          $input = $input . '</div>';
//        }
//
//        return $input;
//      }, 10, 5 );
//    }
//  }
//}

/**
 * Change gravity forms zip field to tel fields
 **/
//if( !is_admin() && wp_is_mobile() ) {
if( !is_admin() ) {

  add_filter( 'gform_field_input', 'tel_field_function', 10, 5 );

  function tel_field_function( $input, $field, $value, $entry_id, $form_id ) {

    if (get_class($field) == "GF_Field_Address") {

      if ($field['isRequired'] == TRUE) {
        $required = 'true';
      } else {
        $required = 'false';
      }

      $max_length = '';

      $input_classes = [];

      foreach ($field->inputs as $field_input) {
        if($field_input['autocompleteAttribute'] == 'address-line1' && isset($field_input['isHidden'])) {
          array_push($input_classes, 'has_street ');
        }
        if($field_input['autocompleteAttribute'] == 'address-line2' && isset($field_input['isHidden'])) {
          array_push($input_classes, 'has_street2 ');
        }
        if($field_input['autocompleteAttribute'] == 'address-level2' && isset($field_input['isHidden'])) {
          array_push($input_classes, 'has_city ');
        }
        if($field_input['autocompleteAttribute'] == 'address-level1' && isset($field_input['isHidden'])) {
          array_push($input_classes, 'has_state ');
        }
        if($field_input['autocompleteAttribute'] == 'postal-code' && isset($field_input['isHidden'])) {
          array_push($input_classes, 'has_zip ');
        }
        if($field_input['autocompleteAttribute'] == 'country-name' && isset($field_input['isHidden'])) {
          array_push($input_classes, 'has_country ');
        }
      }

      $field_count = 0;

      $input = '<div class="ginput_complex ginput_container ginput_container_address ' . implode($input_classes) . '" id="input_' . $field->formId . '_' . $field->id . '">';

      if ($field["subLabelPlacement"] === 'above') {
        // Label placement above
        foreach ($field->inputs as $field_input) {

          if (!array_key_exists("isHidden", $field_input) or (isset($field_input['isHidden']) && $field_input['isHidden'] == false)) {
            $field_count = ++$field_count;

            // Address Line 1
            if ($field_input["autocompleteAttribute"] == "address-line1") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_full address_line_1 ginput_address_line_1" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '<input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '"></span>';
            }

            // Address Line 2
            if ($field_input["autocompleteAttribute"] == "address-line2") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_full address_line_2 ginput_address_line_2" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '<input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '"></span>';
            }

            // Address Level 2
            if ($field_input["autocompleteAttribute"] == "address-level2") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_left address_city ginput_address_city" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '<input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '"></span>';
            }

            // Address Level 1
            if ($field_input["autocompleteAttribute"] == "address-level1") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_right address_state ginput_address_state" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '<input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '"></span>';
            }

            // Postal Code
            if ($field_input["autocompleteAttribute"] == "postal-code") {
              if ($field['addressType'] == 'us') {
                $max_length = 'maxlength="5"';
              }
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_left address_zip ginput_address_zip" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '<input type="tel" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '"' . $max_length . ' onkeypress="return onlyNumberKey(event)"></span>';
            }

            // Country Name
            if ($field_input["autocompleteAttribute"] == "country-name") {
              $input = $input . '<span class="ginput_right address_country ginput_address_country" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '<select name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" aria-required="' . $required . '"><option value="' . $field->defaultValue . '"></option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos Islands">Cocos Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option><option value="Congo, Republic of the">Congo, Republic of the</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Curaçao">Curaçao</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Côte d&#39;Ivoire">Côte d&#39;Ivoire</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Eswatini (Swaziland)">Eswatini (Swaziland)</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard and McDonald Islands">Heard and McDonald Islands</option><option value="Holy See">Holy See</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Lao People&#39;s Democratic Republic">Lao People&#39;s Democratic Republic</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="North Korea">North Korea</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine, State of">Palestine, State of</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Réunion">Réunion</option><option value="Saint Barthélemy">Saint Barthélemy</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Martin">Saint Martin</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Sint Maarten">Sint Maarten</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia">South Georgia</option><option value="South Korea">South Korea</option><option value="South Sudan">South Sudan</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor-Leste">Timor-Leste</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="US Minor Outlying Islands">US Minor Outlying Islands</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States" selected="selected">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option><option value="Åland Islands">Åland Islands</option></select></span>';
            }
          }
        }
      } elseif ($field["subLabelPlacement"] === 'below' || $field["subLabelPlacement"] === null) {
        // Label placement below
        foreach ($field->inputs as $field_input) {


          if (!array_key_exists("isHidden", $field_input) or (isset($field_input['isHidden']) && $field_input['isHidden'] == false)) {
            $field_count = ++$field_count;

            // Address Line 1
            if ($field_input["autocompleteAttribute"] == "address-line1") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_full address_line_1 ginput_address_line_1" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container"><input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '">' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '</span>';
            }

            // Address Line 2
            if ($field_input["autocompleteAttribute"] == "address-line2") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_full address_line_2 ginput_address_line_2" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container"><input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '">' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '</span>';
            }

            // Address Level 2
            if ($field_input["autocompleteAttribute"] == "address-level2") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_left address_city ginput_address_city" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container"><input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '">' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '</span>';
            }

            // Address Level 1
            if ($field_input["autocompleteAttribute"] == "address-level1") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_right address_state ginput_address_state" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container"><input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '">' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '</span>';
            }

            // Postal Code
            if ($field_input["autocompleteAttribute"] == "postal-code") {
              if ($field['addressType'] == 'us') {
                $max_length = 'maxlength="5"';
              }
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_left address_zip ginput_address_zip" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container"><input type="tel" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '"' . $max_length . ' onkeypress="return onlyNumberKey(event)">' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '</span>';
            }

            // Country Name
            if ($field_input["autocompleteAttribute"] == "country-name") {
              $input = $input . '<span class="ginput_right address_country ginput_address_country" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container"><select name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" aria-required="' . $required . '"><option value="' . $field->defaultValue . '"></option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos Islands">Cocos Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option><option value="Congo, Republic of the">Congo, Republic of the</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Curaçao">Curaçao</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Côte d&#39;Ivoire">Côte d&#39;Ivoire</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Eswatini (Swaziland)">Eswatini (Swaziland)</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard and McDonald Islands">Heard and McDonald Islands</option><option value="Holy See">Holy See</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Lao People&#39;s Democratic Republic">Lao People&#39;s Democratic Republic</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="North Korea">North Korea</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine, State of">Palestine, State of</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Réunion">Réunion</option><option value="Saint Barthélemy">Saint Barthélemy</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Martin">Saint Martin</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Sint Maarten">Sint Maarten</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia">South Georgia</option><option value="South Korea">South Korea</option><option value="South Sudan">South Sudan</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor-Leste">Timor-Leste</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="US Minor Outlying Islands">US Minor Outlying Islands</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States" selected="selected">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option><option value="Åland Islands">Åland Islands</option></select>' . '<label for="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_label">' . $field_input["label"] . '</label>' . '</span>';
            }
          }
        }
      } elseif ($field["subLabelPlacement"] === 'hidden_label') {
        // Label hidden
        foreach ($field->inputs as $field_input) {

          $field_input['label'] = '';

          if (!array_key_exists("isHidden", $field_input) or (isset($field_input['isHidden']) && $field_input['isHidden'] == false)) {
            $field_count = ++$field_count;

            // Address Line 1
            if ($field_input["autocompleteAttribute"] == "address-line1") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_full address_line_1 ginput_address_line_1" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . '<input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '"></span>';
            }

            // Address Line 2
            if ($field_input["autocompleteAttribute"] == "address-line2") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_full address_line_2 ginput_address_line_2" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . '<input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '"></span>';
            }

            // Address Level 2
            if ($field_input["autocompleteAttribute"] == "address-level2") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_left address_city ginput_address_city" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . '<input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '"></span>';
            }

            // Address Level 1
            if ($field_input["autocompleteAttribute"] == "address-level1") {
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_right address_state ginput_address_state" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . $field_input["label"] . '</label>' . '<input type="text" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '"></span>';
            }

            // Postal Code
            if ($field_input["autocompleteAttribute"] == "postal-code") {
              if ($field['addressType'] == 'us') {
                $max_length = 'maxlength="5"';
              }
              $placeholder = !empty($field_input['placeholder']) ? $field_input['placeholder'] : '';
              $input = $input . '<span class="ginput_left address_zip ginput_address_zip" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . $field_input["label"] . '</label>' . '<input type="tel" name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" value="' . $field->defaultValue . '" placeholder="' . $placeholder . '" aria-required="' . $required . '"' . $max_length . ' onkeypress="return onlyNumberKey(event)"></span>';
            }

            // Country Name
            if ($field_input["autocompleteAttribute"] == "country-name") {

              $input = $input . '<span class="ginput_right address_country ginput_address_country" id="input_' . $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '_container">' . '<select name="input_' . $field_input['id'] . '" id="input_'. $field->formId . '_' . str_replace('.', '_', $field_input['id']) . '" aria-required="' . $required . '"><option value="' . $field->defaultValue . '"></option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos Islands">Cocos Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option><option value="Congo, Republic of the">Congo, Republic of the</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Curaçao">Curaçao</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Côte d&#39;Ivoire">Côte d&#39;Ivoire</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Eswatini (Swaziland)">Eswatini (Swaziland)</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard and McDonald Islands">Heard and McDonald Islands</option><option value="Holy See">Holy See</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Lao People&#39;s Democratic Republic">Lao People&#39;s Democratic Republic</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="North Korea">North Korea</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine, State of">Palestine, State of</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Réunion">Réunion</option><option value="Saint Barthélemy">Saint Barthélemy</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Martin">Saint Martin</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Sint Maarten">Sint Maarten</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia">South Georgia</option><option value="South Korea">South Korea</option><option value="South Sudan">South Sudan</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor-Leste">Timor-Leste</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="US Minor Outlying Islands">US Minor Outlying Islands</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States" selected="selected">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option><option value="Åland Islands">Åland Islands</option></select></span>';
            }
          }

        }
      }

      $input = $input . '</div>';

    }

    return $input;

  }

}

/**
 * Open confirmation redirects in new tab
 **/
add_filter( 'gform_confirmation', function ( $confirmation, $form, $entry, $ajax ) {
  GFCommon::log_debug( __METHOD__ . '(): running.' );

  // Use this to target specific form id's
//  $forms = array( 1, 2, 3 );
//  if ( ! in_array( $form['id'], $forms ) ) {
//    return $confirmation;
//  }

  if ( isset( $confirmation['redirect'] ) ) {
    $url          = esc_url_raw( $confirmation['redirect'] );
    GFCommon::log_debug( __METHOD__ . '(): Redirect to URL: ' . $url );
    $confirmation = 'Thanks for contacting us! We will get in touch with you shortly.';
    $confirmation .= "<script type=\"text/javascript\">window.open('$url', '_blank');</script>";
  }

  return $confirmation;
}, 10, 4 );


/**
 * Remove required legend
 * @link https://docs.gravityforms.com/gform_required_legend/
 **/
add_filter( 'gform_required_legend', '__return_empty_string' );


/**
 * Validate phone field
 * @link https://docs.gravityforms.com/gform_field_validation/?_ga=2.18153790.664756449.1691513596-1867632267.1691117686
 **/
add_filter( 'gform_field_validation', 'validate_phone', 10, 4 );
function validate_phone( $result, $value, $form, $field ) {
  $pattern = "/^(\+44\s?7\d{3}|\(?07\d{3}\)|\(?01\d{3}\)?)\s?\d{3}\s?\d{3}$/";
  if ( $field->type == 'phone' && $field->phoneFormat != 'standard' && ! preg_match( $pattern, $value ) && $value != '' ) {
    $result['is_valid'] = false;
    $result['message']  = 'Please enter a valid phone number';
  }

  return $result;
}
