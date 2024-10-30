<?php




namespace AgeifyIncludes\Pages;

use \AgeifyIncludes\Api\AgeifySettingsApi;
use \AgeifyIncludes\Base\AgeifyBaseController;
use \AgeifyIncludes\Api\Callbacks\AgeifyAdminCallbacks;

class AgeifyAdmin extends AgeifyBaseController
{	
		
		public $settings;
		
		public $callbacks;
		
		public $pages = array();
		
		public $subpages = array();
		

		function __construct(){

			parent::__construct();

		}
				
		

		function ageify_register() {
			
			
			$this->settings = new AgeifySettingsApi();
			
			$this->callbacks = new AgeifyAdminCallbacks(); 
				
			$this->setPages();
			
			$this->setSubPages();
			
			
			$this->setSettings();
			$this->setSections();
			$this->setFields();
			
			
			$this->settings->addPages( $this->pages )->widthSubpage( 'Dashboard' )->addSubPages( $this->subpages )->ageify_register();
			
			
					
		}
		
		
		
		public function setPages() {
			
			
			$this->pages = array(					
					
				array(
					'page_title' => 'Install Agify',  // Page Title.
					'menu_title' => 'AGEify', 		   // Menu Titile inside Dashboard. 
					'capability' => 'manage_options', // Administrator Level of WordPress Capabilities.
					'menu_slug' => 'install_agify',   // Menu Slug which is the unique identifier of plugin's page.
					'callback' => array( $this->callbacks, 'adminDashboard' ) , // Callback function  which is going to called in order to print the page.
					'icon_url' => 'dashicons-store',  // Icon for the Dshborad Admin Page 
					'position' => 110                  // Position in Dashboard Menu
				)
					
			);
			
			
		}
		
	
		public function setSubPages() {
			
			$this->subpages = array(					
					
					/* array(
						'parent_slug' => 'install_agify',  
						'page_title' => 'Add Traking Identifier Code', 		   
						'menu_title' => 'TIC', 
						'capability' => 'manage_options',
						'menu_slug' => 'install_agify_tic',
						'callback' => function() { echo '<h1>Tracking Identifier Code</h1>'; }	            
					) */
					
			);
			
		}
		
		
	
		

		public function setSettings(){
			
			
			$args = array(
				
				array(
					'option_group' => 'agify_install_options_group',
					'option_name' => 'tracking_identifier_id',
					'callback' => array( $this->callbacks, 'agifyInstallOptionsGroup'  )
				)

			);
			
			$this->settings->setSettings( $args );
			
			
		}
		


		
		public function setSections(){
			
			
			$args = array(
				
				array(
					'id' => 'agify_admin_section',
					'title' => '',
					'callback' => array( $this->callbacks, 'agifyAdminSection'  ),
					'page' => 'install_agify' 
				)

			);
			
			$this->settings->setSections( $args );
			
			
		}
		
		


		public function setFields(){
			
			
			$args = array(
				
				array(
					'id' => 'tracking_identifier_id',
					'title' => 'Tracking Identifier Id',
					'callback' => array( $this->callbacks, 'agifyInstallField'  ),
					'page' => 'install_agify',    
					'section' => 'agify_admin_section',
					'arg' => array(
						'label_for' => 'tracking_identifier_id',
						'class' => 'trackingIdentifier'
					) 
					
				)

			);
			
			$this->settings->setFields( $args );
			
			
		}
		
		
			
}







