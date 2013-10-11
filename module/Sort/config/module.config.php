<?php
return [
    'controllers' => [
        'invokables' => [
            'Sort\Controller\Sort' => 'Sort\Controller\SortController',
        ],
    ],
    'router' => [
        'routes' => [
            'sort' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/sort',
                    'defaults' => [
                        'controller' => 'Sort\Controller\Sort',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'sort' => __DIR__ . '/../view',
        ],
    ],
    'navigation' => [
        'default' => [
            'sort' => [
                'label' => 'Sort',
                'route' => 'sort',
            ],
        ],
    ],
];
