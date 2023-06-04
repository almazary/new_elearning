<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc60b0e26e57227dba3a620951ead79e6
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc60b0e26e57227dba3a620951ead79e6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc60b0e26e57227dba3a620951ead79e6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc60b0e26e57227dba3a620951ead79e6::$classMap;

        }, null, ClassLoader::class);
    }
}
