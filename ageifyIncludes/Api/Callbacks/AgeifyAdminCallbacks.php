<?php




namespace AgeifyIncludes\Api\Callbacks;

use AgeifyIncludes\Base\AgeifyBaseController;

class AgeifyAdminCallbacks extends AgeifyBaseController
{
		
		
		
		public function adminDashboard(){
			
			return require_once( "$this->plugin_path/templates/admin.php" );
		}
		
		
		public function agifyInstallOptionsGroup( $input ){
				
				return $input;			
			
		}
		

		public function agifyAdminSection(){
			
			echo '';			
		
		}
		
		
		public function agifyInstallField(){
			
			$tracking_identifier_id_value = esc_attr( get_option('tracking_identifier_id') ); 
			
			echo '<input type="text" class="regular-text" name="tracking_identifier_id" value=" ' . $tracking_identifier_id_value . ' " placeholder ="enter value here..." />';			
			
		
		
		}
		
		
		
		
}














