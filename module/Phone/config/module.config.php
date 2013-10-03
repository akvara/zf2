<?php

namespace Phone;

return [

    // Routes
    'router' => [
        'routes' => [
            'phoneSoap' => [
                'type'    => 'literal',
                'options' => [
                    'route'    => '/phone/soap',
                    'defaults' => [
                        'controller' => __NAMESPACE__ . '\Controller\Soap',
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

    // Invokable Controllers
    'controllers' => [
        'invokables' => [
            __NAMESPACE__ . '\Controller\Soap' => __NAMESPACE__ . '\Controller\SoapController',
        ],
    ],

    // Phone module settings
    'phoneModule' => [
        'soap' => [
            'options' => [
                'cache_wsdl' => WSDL_CACHE_NONE,
            ],
        ],
        'asterisk' => [
            'host'            => '10.10.45.5',
            'port'            => '5038',
            'username'        => 'manager1',
            'secret'          => '1234',
            'connect_timeout' => 10,
            'read_timeout'    => 10,
            'scheme'          => 'tcp://',
        ],
    ],

    // Doctrine configuration
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_entity' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    realpath(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'),
                ]
            ],

            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_entity',

                ],
            ],
        ],
    ],

    // BjyAuthorize module specific config
    'bjyauthorize' => [
        'guards' => [
            'BjyAuthorize\Guard\Controller' => [
                ['controller' => __NAMESPACE__ . '\Controller\Soap', 'roles' => ['guest']],
            ],
        ],
    ],
];
