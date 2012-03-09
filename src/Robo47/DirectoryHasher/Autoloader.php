<?php

/**
 * Autoloads DirectoryHasher classes.
 *
 * @author  Fabien Potencier <fabien@symfony.com>
 * @see https://github.com/fabpot/Twig/blob/master/lib/Twig/Autoloader.php
 */
class Robo47_DirectoryHasher_Autoloader
{
    /**
     * Registers Robo47_DirectoryHasher_Autoloader as an SPL autoloader.
     */
    static public function register()
    {
        ini_set('unserialize_callback_func', 'spl_autoload_call');
        spl_autoload_register(array(new self, 'autoload'));
    }

    /**
     * Handles autoloading of classes.
     *
     * @param  string  $class  A class name.
     *
     * @return boolean Returns true if the class has been loaded
     */
    static public function autoload($class)
    {
        if (0 !== strpos($class, 'Robo47_DirectoryHasher')) {
            return;
        }

        if (is_file($file = dirname(__FILE__).'/../../'.str_replace(array('_', "\0"), array('/', ''), $class).'.php')) {
            require $file;
        }
    }
}
