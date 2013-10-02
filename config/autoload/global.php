<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'db' => array(
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname=zf2;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
                    => 'Zend\Db\Adapter\AdapterServiceFactory',
            'Zend\Log' => function ($sm) {
                $log = new Zend\Log\Logger();
                $writer = new Zend\Log\Writer\Stream('php://output');
                // $writer = new Zend\Log\Writer\Stream('./data/logs/logfile');
                $log->addWriter($writer);
                return $log;
            },
        ),
    ),
    'doctrine' => [
        'driver' => [
            'phone_entity' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [ realpath(__DIR__ . '/../../module/Phone/src/Phone/Entity')]
            ],
            'orm_default' => [
                'drivers' => ['Phone\Entity' => 'phone_entity'],
            ],
        ],
    ],
);
