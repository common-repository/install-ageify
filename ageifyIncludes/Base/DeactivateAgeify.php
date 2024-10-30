<?php



namespace AgeifyIncludes\Base;

class DeactivateAgeify
{

    public static function deactivatePlugin(){
        flush_rewrite_rules();	
    }


}





















