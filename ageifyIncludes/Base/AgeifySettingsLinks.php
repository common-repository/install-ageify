<?php



namespace AgeifyIncludes\Base;


use \AgeifyIncludes\Base\AgeifyBaseController;


class AgeifySettingsLinks extends AgeifyBaseController
{

		public function ageify_register() {
					
		
				add_filter( 
					
						"plugin_action_links_" . PLUGIN_NAME,  // plugin_action_links + plugin's name,
						array( $this, 'settings_link') // Callback function
					); 	
					
		}
		
		
		//Create Setting Link add to the list of Links plugin has by default ( Activate & Deactivate )
		
		public function settings_link( $links ){
			
			$settings_link = '<a href="admin.php?page=install_agify">Settings</a>';
			array_push( $links, $settings_link );
			return $links;
			
		}

	

		
}









