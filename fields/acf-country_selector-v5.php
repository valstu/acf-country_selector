<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_field_country_selector') ) :


class acf_field_country_selector extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/
		
		$this->name = 'country_selector';
		
		
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		
		$this->label = __('Country Selector', 'acf-country_selector');
		
		
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		
		$this->category = 'choice';
		
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		
		$this->defaults = array(
			'value' => 'United States',
		);
		
		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('country_selector', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> __('Error! Please enter a higher value', 'acf-country_selector'),
		);
		
				
		// do not delete!
    	parent::__construct();
    	
	}
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/
		
		acf_render_field_setting( $field, array(
			'label'			=> __('Country Selector','acf-country_selector'),
			'instructions'	=> __('Select country','acf-country_selector'),
			'type'			=> 'select',
			'name'			=> 'initial_value',
			'choices'		=> $this->get_countries(),
		));

	}
	
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field( $field ) {
		
		
		/*
		*  Review the data of $field.
		*  This will show what data is available
		*/
		?>
		<div>
			<select name='<?php echo $field['name'] ?>'>
				<?php
					foreach( $this->get_countries() as $country ) :
				?>
					<option <?php selected( $field['value'], $country ) ?> value='<?php echo $country ?>'><?php echo $country ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<?php
		
	}
	
		
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function input_admin_enqueue_scripts() {
		
		$dir = plugin_dir_url( __FILE__ );
		
		
		// register & include JS
		wp_register_script( 'acf-input-country_selector', "{$dir}assets/js/input.js" );
		wp_enqueue_script('acf-input-country_selector');
		
		
		// register & include CSS
		wp_register_style( 'acf-input-country_selector', "{$dir}assets/css/input.css" ); 
		wp_enqueue_style('acf-input-country_selector');
		
		
	}
	
	*/
	
	
	/*
	*  input_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_head() {
	
		
		
	}
	
	*/
	
	
	/*
   	*  input_form_data()
   	*
   	*  This function is called once on the 'input' page between the head and footer
   	*  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and 
   	*  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
   	*  seen on comments / user edit forms on the front end. This function will always be called, and includes
   	*  $args that related to the current screen such as $args['post_id']
   	*
   	*  @type	function
   	*  @date	6/03/2014
   	*  @since	5.0.0
   	*
   	*  @param	$args (array)
   	*  @return	n/a
   	*/
   	
   	/*
   	
   	function input_form_data( $args ) {
	   	
		
	
   	}
   	
   	*/
	
	
	/*
	*  input_admin_footer()
	*
	*  This action is called in the admin_footer action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_footer)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_footer() {
	
		
		
	}
	
	*/
	
	
	/*
	*  field_group_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
	*  Use this action to add CSS + JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_enqueue_scripts() {
		
	}
	
	*/

	
	/*
	*  field_group_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is edited.
	*  Use this action to add CSS and JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_head() {
	
	}
	
	*/


	/*
	*  load_value()
	*
	*  This filter is applied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	/*
	
	function load_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	
	*/
	
	
	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is saved in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	/*
	
	function update_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	
	*/
	
	
	/*
	*  format_value()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value which was loaded from the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*
	*  @return	$value (mixed) the modified value
	*/
		
	/*
	
	function format_value( $value, $post_id, $field ) {
		
		// bail early if no value
		if( empty($value) ) {
		
			return $value;
			
		}
		
		
		// apply setting
		if( $field['font_size'] > 12 ) { 
			
			// format the value
			// $value = 'something';
		
		}
		
		
		// return
		return $value;
	}
	
	*/
	
	
	/*
	*  validate_value()
	*
	*  This filter is used to perform validation on the value prior to saving.
	*  All values are validated regardless of the field's required setting. This allows you to validate and return
	*  messages to the user if the value is not correct
	*
	*  @type	filter
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$valid (boolean) validation status based on the value and the field's required setting
	*  @param	$value (mixed) the $_POST value
	*  @param	$field (array) the field array holding all the field options
	*  @param	$input (string) the corresponding input name for $_POST value
	*  @return	$valid
	*/
	
	/*
	
	function validate_value( $valid, $value, $field, $input ){
		
		// Basic usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = false;
		}
		
		
		// Advanced usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = __('The value is too little!','acf-country_selector'),
		}
		
		
		// return
		return $valid;
		
	}
	
	*/
	
	
	/*
	*  delete_value()
	*
	*  This action is fired after a value has been deleted from the db.
	*  Please note that saving a blank value is treated as an update, not a delete
	*
	*  @type	action
	*  @date	6/03/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (mixed) the $post_id from which the value was deleted
	*  @param	$key (string) the $meta_key which the value was deleted
	*  @return	n/a
	*/
	
	/*
	
	function delete_value( $post_id, $key ) {
		
		
		
	}
	
	*/
	
	
	/*
	*  load_field()
	*
	*  This filter is applied to the $field after it is loaded from the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0	
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	/*
	
	function load_field( $field ) {
		
		return $field;
		
	}	
	
	*/
	
	
	/*
	*  update_field()
	*
	*  This filter is applied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	/*
	
	function update_field( $field ) {
		
		return $field;
		
	}	
	
	*/
	
	
	/*
	*  delete_field()
	*
	*  This action is fired after a field is deleted from the database
	*
	*  @type	action
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	n/a
	*/
	
	/*
	
	function delete_field( $field ) {
		
		
		
	}	
	
	*/

	function get_countries() {
		$countries = array("Afghanistan" => "Afghanistan", "Albania" => "Albania", "Algeria" => "Algeria", "American Samoa" => "American Samoa", "Andorra" => "Andorra", "Angola" => "Angola", "Anguilla" => "Anguilla", "Antarctica" => "Antarctica", "Antigua and Barbuda" => "Antigua and Barbuda", "Argentina" => "Argentina", "Armenia" => "Armenia", "Aruba" => "Aruba", "Australia" => "Australia", "Austria" => "Austria", "Azerbaijan" => "Azerbaijan", "Bahamas" => "Bahamas", "Bahrain" => "Bahrain", "Bangladesh" => "Bangladesh", "Barbados" => "Barbados", "Belarus" => "Belarus", "Belgium" => "Belgium", "Belize" => "Belize", "Benin" => "Benin", "Bermuda" => "Bermuda", "Bhutan" => "Bhutan", "Bolivia" => "Bolivia", "Bosnia and Herzegowina" => "Bosnia and Herzegowina", "Botswana" => "Botswana", "Bouvet Island" => "Bouvet Island", "Brazil" => "Brazil", "British Indian Ocean Territory" => "British Indian Ocean Territory", "Brunei Darussalam" => "Brunei Darussalam", "Bulgaria" => "Bulgaria", "Burkina Faso" => "Burkina Faso", "Burundi" => "Burundi", "Cambodia" => "Cambodia", "Cameroon" => "Cameroon", "Canada" => "Canada", "Cape Verde" => "Cape Verde", "Cayman Islands" => "Cayman Islands", "Central African Republic" => "Central African Republic", "Chad" => "Chad", "Chile" => "Chile", "China" => "China", "Christmas Island" => "Christmas Island", "Cocos (Keeling) Islands" => "Cocos (Keeling) Islands", "Colombia" => "Colombia", "Comoros" => "Comoros", "Congo" => "Congo", "Congo, the Democratic Republic of the" => "Congo, the Democratic Republic of the", "Cook Islands" => "Cook Islands", "Costa Rica" => "Costa Rica", "Cote d'Ivoire" => "Cote d'Ivoire", "Croatia (Hrvatska)" => "Croatia (Hrvatska)", "Cuba" => "Cuba", "Cyprus" => "Cyprus", "Czech Republic" => "Czech Republic", "Denmark" => "Denmark", "Djibouti" => "Djibouti", "Dominica" => "Dominica", "Dominican Republic" => "Dominican Republic", "East Timor" => "East Timor", "Ecuador" => "Ecuador", "Egypt" => "Egypt", "El Salvador" => "El Salvador", "Equatorial Guinea" => "Equatorial Guinea", "Eritrea" => "Eritrea", "Estonia" => "Estonia", "Ethiopia" => "Ethiopia", "Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)", "Faroe Islands" => "Faroe Islands", "Fiji" => "Fiji", "Finland" => "Finland", "France" => "France", "France Metropolitan" => "France Metropolitan", "French Guiana" => "French Guiana", "French Polynesia" => "French Polynesia", "French Southern Territories" => "French Southern Territories", "Gabon" => "Gabon", "Gambia" => "Gambia", "Georgia" => "Georgia", "Germany" => "Germany", "Ghana" => "Ghana", "Gibraltar" => "Gibraltar", "Greece" => "Greece", "Greenland" => "Greenland", "Grenada" => "Grenada", "Guadeloupe" => "Guadeloupe", "Guam" => "Guam", "Guatemala" => "Guatemala", "Guinea" => "Guinea", "Guinea-Bissau" => "Guinea-Bissau", "Guyana" => "Guyana", "Haiti" => "Haiti", "Heard and Mc Donald Islands" => "Heard and Mc Donald Islands", "Holy See (Vatican City State)" => "Holy See (Vatican City State)", "Honduras" => "Honduras", "Hong Kong" => "Hong Kong", "Hungary" => "Hungary", "Iceland" => "Iceland", "India" => "India", "Indonesia" => "Indonesia", "Iran (Islamic Republic of)" => "Iran (Islamic Republic of)", "Iraq" => "Iraq", "Ireland" => "Ireland", "Israel" => "Israel", "Italy" => "Italy", "Jamaica" => "Jamaica", "Japan" => "Japan", "Jordan" => "Jordan", "Kazakhstan" => "Kazakhstan", "Kenya" => "Kenya", "Kiribati" => "Kiribati", "Korea, Democratic People's Republic of" => "Korea, Democratic People's Republic of", "Korea, Republic of" => "Korea, Republic of", "Kuwait" => "Kuwait", "Kyrgyzstan" => "Kyrgyzstan", "Lao, People's Democratic Republic" => "Lao, People's Democratic Republic", "Latvia" => "Latvia", "Lebanon" => "Lebanon", "Lesotho" => "Lesotho", "Liberia" => "Liberia", "Libyan Arab Jamahiriya" => "Libyan Arab Jamahiriya", "Liechtenstein" => "Liechtenstein", "Lithuania" => "Lithuania", "Luxembourg" => "Luxembourg", "Macau" => "Macau", "Macedonia, The Former Yugoslav Republic of" => "Macedonia, The Former Yugoslav Republic of", "Madagascar" => "Madagascar", "Malawi" => "Malawi", "Malaysia" => "Malaysia", "Maldives" => "Maldives", "Mali" => "Mali", "Malta" => "Malta", "Marshall Islands" => "Marshall Islands", "Martinique" => "Martinique", "Mauritania" => "Mauritania", "Mauritius" => "Mauritius", "Mayotte" => "Mayotte", "Mexico" => "Mexico", "Micronesia, Federated States of" => "Micronesia, Federated States of", "Moldova, Republic of" => "Moldova, Republic of", "Monaco" => "Monaco", "Mongolia" => "Mongolia", "Montserrat" => "Montserrat", "Morocco" => "Morocco", "Mozambique" => "Mozambique", "Myanmar" => "Myanmar", "Namibia" => "Namibia", "Nauru" => "Nauru", "Nepal" => "Nepal", "Netherlands" => "Netherlands", "Netherlands Antilles" => "Netherlands Antilles", "New Caledonia" => "New Caledonia", "New Zealand" => "New Zealand", "Nicaragua" => "Nicaragua", "Niger" => "Niger", "Nigeria" => "Nigeria", "Niue" => "Niue", "Norfolk Island" => "Norfolk Island", "Northern Mariana Islands" => "Northern Mariana Islands", "Norway" => "Norway", "Oman" => "Oman", "Pakistan" => "Pakistan", "Palau" => "Palau", "Panama" => "Panama", "Papua New Guinea" => "Papua New Guinea", "Paraguay" => "Paraguay", "Peru" => "Peru", "Philippines" => "Philippines", "Pitcairn" => "Pitcairn", "Poland" => "Poland", "Portugal" => "Portugal", "Puerto Rico" => "Puerto Rico", "Qatar" => "Qatar", "Reunion" => "Reunion", "Romania" => "Romania", "Russian Federation" => "Russian Federation", "Rwanda" => "Rwanda", "Saint Kitts and Nevis" => "Saint Kitts and Nevis", "Saint Lucia" => "Saint Lucia", "Saint Vincent and the Grenadines" => "Saint Vincent and the Grenadines", "Samoa" => "Samoa", "San Marino" => "San Marino", "Sao Tome and Principe" => "Sao Tome and Principe", "Saudi Arabia" => "Saudi Arabia", "Senegal" => "Senegal", "Seychelles" => "Seychelles", "Sierra Leone" => "Sierra Leone", "Singapore" => "Singapore", "Slovakia (Slovak Republic)" => "Slovakia (Slovak Republic)", "Slovenia" => "Slovenia", "Solomon Islands" => "Solomon Islands", "Somalia" => "Somalia", "South Africa" => "South Africa", "South Georgia and the South Sandwich Islands" => "South Georgia and the South Sandwich Islands", "Spain" => "Spain", "Sri Lanka" => "Sri Lanka", "St. Helena" => "St. Helena", "St. Pierre and Miquelon" => "St. Pierre and Miquelon", "Sudan" => "Sudan", "Suriname" => "Suriname", "Svalbard and Jan Mayen Islands" => "Svalbard and Jan Mayen Islands", "Swaziland" => "Swaziland", "Sweden" => "Sweden", "Switzerland" => "Switzerland", "Syrian Arab Republic" => "Syrian Arab Republic", "Taiwan, Province of China" => "Taiwan, Province of China", "Tajikistan" => "Tajikistan", "Tanzania, United Republic of" => "Tanzania, United Republic of", "Thailand" => "Thailand", "Togo" => "Togo", "Tokelau" => "Tokelau", "Tonga" => "Tonga", "Trinidad and Tobago" => "Trinidad and Tobago", "Tunisia" => "Tunisia", "Turkey" => "Turkey", "Turkmenistan" => "Turkmenistan", "Turks and Caicos Islands" => "Turks and Caicos Islands", "Tuvalu" => "Tuvalu", "Uganda" => "Uganda", "Ukraine" => "Ukraine", "United Arab Emirates" => "United Arab Emirates", "United Kingdom" => "United Kingdom", "United States" => "United States", "United States Minor Outlying Islands" => "United States Minor Outlying Islands", "Uruguay" => "Uruguay", "Uzbekistan" => "Uzbekistan", "Vanuatu" => "Vanuatu", "Venezuela" => "Venezuela", "Vietnam" => "Vietnam", "Virgin Islands (British)" => "Virgin Islands (British)", "Virgin Islands (U.S.)" => "Virgin Islands (U.S.)", "Wallis and Futuna Islands" => "Wallis and Futuna Islands", "Western Sahara" => "Western Sahara", "Yemen" => "Yemen", "Yugoslavia" => "Yugoslavia", "Zambia" => "Zambia", "Zimbabwe" => "Zimbabwe" );
		return $countries;
	}
	
	
}


// create initialize
new acf_field_country_selector();


// class_exists check
endif;

?>