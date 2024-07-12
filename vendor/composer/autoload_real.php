<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit8ab1d0d075d7b04540b0b6c6270dfda6
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

        spl_autoload_register(array('ComposerAutoloaderInit8ab1d0d075d7b04540b0b6c6270dfda6', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit8ab1d0d075d7b04540b0b6c6270dfda6', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit8ab1d0d075d7b04540b0b6c6270dfda6::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
