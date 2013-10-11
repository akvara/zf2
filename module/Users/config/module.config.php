<?php
return [
    'controllers' => [
        'invokables' => [
            'Users\Controller\Index' => 'Users\Controller\IndexController',
            'Users\Controller\Register' => 'Users\Controller\RegisterController',
            'Users\Controller\Login' => 'Users\Controller\LoginController',

        ],
    ],
    'router' => [
        'routes' => [
            'users' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/users',
                    'defaults' => [
                        '__NAMESPACE__' => 'Users\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'users' => __DIR__ . '/../view',
        ],
    ],
    'navigation' => [
        'default' => [
            'account' => [
                'label' => 'Account',
                'route' => 'zfcuser',
                'pages' => [
                    'home' => [
                        'label' => 'Dashboard',
                        'route' => 'zfcuser',
                    ],
                    'login' => [
                        'label' => 'Sign In',
                        'route' => 'zfcuser/login',
                    ],
                    'logout' => [
                        'label' => 'Sign Out',
                        'route' => 'zfcuser/logout',
                    ],
                    'register' => [
                        'label' => 'Register',
                        'route' => 'zfcuser/register',
                    ],
                ],
            ],
        ],
    ],
];
