<?php



namespace AgeifyIncludes\Base;

use \AgeifyIncludes\Base\AgeifyBaseController;

class AgeifyEnqueue extends AgeifyBaseController
{
			
		function ageify_register() {	
			
			add_action( 'wp_footer', array( $this , 'ageifyWrapper') );
			add_action( 'wp_enqueue_scripts' , array( $this, 'enqueue' ) );
			
		}
		
		
		// including all required containers and trackink identifier input text
		public function ageifyWrapper(){
			
			 echo '<div id="ageifyContainer">';
			 
				 echo '<div id="ageifyWrapper">';

				 echo '</div><!-- End of ageifyWrapper -->';
				 
				 $tracking_identifier_id_value = esc_attr( get_option('tracking_identifier_id') ); 		
				echo '<input type="hidden" id="trackingIdentifier" value="' . htmlspecialchars($tracking_identifier_id_value) . '" />'."\n";
			 
			 echo '</div><!-- End of ageifyContainer -->'; 
			 
		} 
		
		
		// including all stylesheets and javascript files
		function enqueue(){
			wp_enqueue_style( 'bootstrap.min', 'https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css' );
			wp_enqueue_style( 'agify-style', $this->plugin_url . 'assets/ageify.css' );
			wp_enqueue_script('ageigy', 'https://api-prod.age-ify.com/js/ageifyCms.js', array(), '', true );	
			wp_enqueue_script('bootstrap.min', 'https://api-prod.age-ify.com/js/bootstrap.min.js', array(), '', true );		
		}
		

		
			
}