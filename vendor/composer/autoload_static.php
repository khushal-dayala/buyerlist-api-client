<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd2121e608c754d74cc16f3d0e3c191bf
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'BuyerListApiClient\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'BuyerListApiClient\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd2121e608c754d74cc16f3d0e3c191bf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd2121e608c754d74cc16f3d0e3c191bf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd2121e608c754d74cc16f3d0e3c191bf::$classMap;

        }, null, ClassLoader::class);
    }
}
