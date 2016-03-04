<?php

/*
Plugin Name: Advanced Custom Fields: Country Selector
Plugin URI: https://github.com/valstu/acf-country_selector
Description: Country Select Box
Version: 1.0.0
Author: Valtteri Karesto
Author URI: http://github.com/valstu
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_plugin_country_selector') ) :

class acf_plugin_country_selector {
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		// set text domain
		// https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
		load_plugin_textdomain( 'acf-country_selector', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field_types')); // v5
		add_action('acf/register_fields', 		array($this, 'include_field_types')); // v4
		
	}
	
	
	/*
	*  include_field_types
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to 4
	*  @return	n/a
	*/
	
	function include_field_types( $version = 4 ) {
		
		// include
		include_once('fields/acf-country_selector-v' . $version . '.php');
		
	}
	
}


// initialize
new acf_plugin_country_selector();


// class_exists check
endif;
	
?>