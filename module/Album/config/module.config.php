<?php
return [
    'controllers' => [
        'invokables' => [
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
        ],
    ],
    'router' => [
        'routes' => [
            'album' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/album[/][:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
    'navigation' => [
        'default' => [
            'album' => [
                'label' => 'Albums',
                'route' => 'album',
                'pages' => [
                    [
                        'label' => 'Add',
                        'route' => 'album',
                        'action' => 'add',
                    ],
                    [
                        'label' => 'Edit',
                        'route' => 'album',
                        'action' => 'edit',
                    ],
                    [
                        'label' => 'Delete',
                        'route' => 'album',
                        'action' => 'delete',
                    ],
                ],
            ],
        ],

    ],
];
