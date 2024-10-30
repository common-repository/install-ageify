<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitafe843a7dff4db5c9e953394354fef85
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AgeifyIncludes\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AgeifyIncludes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/ageifyIncludes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitafe843a7dff4db5c9e953394354fef85::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitafe843a7dff4db5c9e953394354fef85::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}