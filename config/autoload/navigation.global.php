<?php
return [
    'navigation' => [
        'default' => [
            [
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

            'sort' => [
                'label' => 'Sort',
                'route' => 'sort',
            ],

            'contact' => [
                'label' => 'Contact',
                'route' => 'contact',
            ],

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
