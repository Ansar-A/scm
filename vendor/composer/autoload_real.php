<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd6d3f0178f5e1fa9d2cce4e5a22f0dae
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitd6d3f0178f5e1fa9d2cce4e5a22f0dae', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd6d3f0178f5e1fa9d2cce4e5a22f0dae', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd6d3f0178f5e1fa9d2cce4e5a22f0dae::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitd6d3f0178f5e1fa9d2cce4e5a22f0dae::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequired6d3f0178f5e1fa9d2cce4e5a22f0dae($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequired6d3f0178f5e1fa9d2cce4e5a22f0dae($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
