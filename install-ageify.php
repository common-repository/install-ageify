<?php

/**
/* @pacjage agifyinstall
*/
/**
Plugin name: Install Ageify Plugin
Plugin URI: https://bitbucket.org/upcom/ageify_site_plugins/src/Wordpress/Agify/
Description: This is a plugin for automatically installing AGEify on a WordPress site.
Version: 1.1.0
Author: Upcom
Author URI: https://www.upcom.eu/en/
License: GPLv2 or Later
Text Domain: install-agify
*/

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see https://www.upcom.eu/en/
*/





// Access denied if this call directly
defined( 'ABSPATH') or die( 'Access to this file is denied!');



// Include the composer for easily using namespaces
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


// Define constants 
define( 'PLUGIN_NAME' , plugin_basename(__FILE__) ) ; 




// Code for Plugin Activation
function activate_install_agify_plugin() {
	AgeifyIncludes\Base\ActivateAgeify::activatePlugin();
}

register_activation_hook( __FILE__ , 'activate_install_agify_plugin');


// Code for Plugin Deactivation
function deactivate_install_agify_plugin() {
	AgeifyIncludes\Base\DeactivateAgeify::deactivatePlugin();
}

register_deactivation_hook( __FILE__ , 'deactivate_install_agify_plugin');



// Initialising all the core classes of the Plugin responsible for the related functionalities.
if ( class_exists( 'AgeifyIncludes\\InitAgeify' ) ){
	
	AgeifyIncludes\InitAgeify::register_ageify_services();

}







