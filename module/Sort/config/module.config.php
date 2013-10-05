<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Sort\Controller\Sort' => 'Sort\Controller\SortController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'sort' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/sort',
                    'defaults' => array(
                        'controller' => 'Sort\Controller\Sort',
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