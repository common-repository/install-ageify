<?php


namespace AgeifyIncludes;

defined( 'ABSPATH') or die( 'Access to this file is denied!');



final class InitAgeify
{
	
		/**
			* Stores all the classes inside an array.
			* Return an array with a full list of classes.
		*/
		
		public static function get_ageify_services(){
			
			return [			
				new Base\AgeifyEnqueue,
				new Base\AgeifySettingsLinks,
				new Pages\AgeifyAdmin
			];
		
		}
		
		
		
		/**
			* Loops throught all the classes, initialise them.
			* Calls the ageify_register method if exists inside this class.
			* It does not return anything.
		*/

		public static function register_ageify_services() {
			
			foreach ( self::get_ageify_services() as $class ) 
			{

				if( method_exists( $class, 'ageify_register' ) ) {
					$class->ageify_register();
				}
				
			}
					
		}

}


