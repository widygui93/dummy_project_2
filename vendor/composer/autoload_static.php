<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfaa0242546d125ef180b56cbd77e4302
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfaa0242546d125ef180b56cbd77e4302::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfaa0242546d125ef180b56cbd77e4302::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
