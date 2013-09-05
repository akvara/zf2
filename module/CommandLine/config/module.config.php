<?php
return array(
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
            ),
        ),
    ),

    'console' => array(
        'router' => array(
            'routes' => array(
                'commandline-my' => array(
                    'options' => array(
                        'route' => 'commandline my',
                        'defaults' => array(
                            'controller' => 'CommandLine\Controller\CommandLine',
                            'action' => 'my'
                        ),
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'CommandLine\Controller\CommandLine' => 'CommandLine\Controller\CommandLineController',
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'commandline' => __DIR__ . '/../view',
        ),
    ),
);
