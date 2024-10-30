<?php



namespace AgeifyIncludes\Base;


class AgeifyBaseController
{
		
		// Declare variables. 
 		public $plugin_path;
		public $plugin_url;
		public $plugin_name;
		
		
		// Define all constraint used in various files.
		function __construct() {
			$this->plugin_path = plugin_dir_path(dirname(__FILE__)).'../';
			$this->plugin_url = plugin_dir_url(dirname(__FILE__)).'../';
		}

		
}

