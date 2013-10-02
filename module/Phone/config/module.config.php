<?php

return [
    'router' => [
        'routes' => [
            'phone_soap' => [
                'type'    => 'literal',
                'options' => [
                    'route'    => '/phone/soap',
                    'defaults' => [
                        'controller' => 'Phone\Controller\Soap',
                        'action'     => 'soap',
                    ],
                ],
            ],
            'phone_test' => [
                'type'    => 'literal',
                'options' => [
                    'route'    => '/phone/test',
                    'defaults' => [
                        'controller' => 'Phone\Controller\Soap',
                        'action'     => 'test',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'invokables' => [
            'Phone\Controller\Soap' => 'Phone\Controller\SoapController',
        ],
    ],
    'phone_soap' => [
        'server' => [
            'options' => [
                'cache_wsdl' => WSDL_CACHE_NONE,
            ],
        ],
    ],
    // BjyAuthorize module specific config
    'bjyauthorize' => [
        'guards' => [
            'BjyAuthorize\Guard\Route' => [
                ['route' => 'phone/soap', 'roles' => ['guest']],
            ],
        ],
    ],
];
