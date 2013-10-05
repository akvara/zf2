<?php

namespace Test;

use Zend\Mvc\Application;
use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceManager;

abstract class Bootstrap
{
    /**
     * @var Application
     */
    protected static $application;

    /**
     * @var ServiceManager
     */
    protected static $serviceManager;

    /**
     * Init testing suite Bootstrap
     *
     * @param  Zend\Mvc\Application $application
     * @return void
     */
    public static function init(Application $application)
    {
        static::$application = $application;

        $serviceManager = $application->getServiceManager();
        $serviceManager->get('ModuleManager')->loadModules();
        static::$serviceManager = $serviceManager;
    }

    //

    /**
     * Get Application
     *
     * @return Zend\Mvc\Application
     * @throws Test\BootstrapException
     */
    public static function getApplication()
    {
        if (! isset(static::$application)) {
            throw new BootstrapException();
        }

        return static::$application;
    }

    /**
     * Get Application Configuration
     *
     * @return array
     * @throws Test\BootstrapException
     */
    public static function getApplicationConfig()
    {
        return static::getServiceManager()->get('ApplicationConfig');
    }

    /**
     * Get Service Manager
     *
     * @return Zend\ServiceManager\ServiceManager
     * @throws Test\BootstrapException
     */
    public static function getServiceManager()
    {
        if (! isset(static::$serviceManager)) {
            throw new BootstrapException();
        }

        return static::$serviceManager;
    }

}
