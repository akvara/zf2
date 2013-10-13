<?php
return [
    'contact' => [
        'captcha' => [
            'class' => 'dumb',
        ],
        'form' => [
            'name' => 'contact',
        ],
        'mail_transport' => [
            'class' => 'Zend\Mail\Transport\Sendmail',
            'options' => [
            ]
        ],
        'message' => [
            /*
            'to' => [
                'EMAIL HERE' => 'NAME HERE',
            ],
            'sender' => [
                'address' => 'EMAIL HERE',
                'name'    => 'NAME HERE',
            ],
            'from' => [
                'EMAIL HERE' => 'NAME HERE',
            ],
             */
        ],
    ],
    'controllers' => [
        'factories' => [
            'Contact\Controller\Contact' => 'Contact\Service\ContactControllerFactory',
        ],
    ],
    'router' => [
        'routes' => [
            'contact' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/contact',
                    'defaults' => [
                        '__NAMESPACE__' => 'Contact\Controller',
                        'controller'    => 'Contact',
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'process' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/process',
                            'defaults' => [
                                'action' => 'process',
                            ],
                        ],
                    ],
                    'thank-you' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/thank-you',
                            'defaults' => [
                                'action' => 'thank-you',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            'ContactCaptcha'       => 'Contact\Service\ContactCaptchaFactory',
            'ContactForm'          => 'Contact\Service\ContactFormFactory',
            'ContactMailMessage'   => 'Contact\Service\ContactMailMessageFactory',
            'ContactMailTransport' => 'Contact\Service\ContactMailTransportFactory',
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'contact/contact/index'     => __DIR__ . '/../view/contact/contact/index.phtml',
            'contact/contact/thank-you' => __DIR__ . '/../view/contact/contact/thank-you.phtml',
        ],
        'template_path_stack' => [
            'contact' => __DIR__ . '/../view',
        ],
    ],
    'navigation' => [
        'default' => [
            'contact' => [
                'label' => 'Contact',
                'route' => 'contact',
            ],
        ],
    ],
];
