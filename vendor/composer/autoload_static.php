<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita5e75728eb95fb65ccc515f1b08d9b90
{
    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'eftec\\bladeone\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'eftec\\bladeone\\' => 
        array (
            0 => __DIR__ . '/..' . '/eftec/bladeone/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita5e75728eb95fb65ccc515f1b08d9b90::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita5e75728eb95fb65ccc515f1b08d9b90::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita5e75728eb95fb65ccc515f1b08d9b90::$classMap;

        }, null, ClassLoader::class);
    }
}
