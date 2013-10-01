<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'ArraySort\Controller\ArraySort' => 'ArraySort\Controller\ArraySortController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'sort' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/sort',
                    'defaults' => array(
                        'controller' => 'ArraySort\Controller\ArraySort',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'sort' => __DIR__ . '/../view',
        ),
    ),
);