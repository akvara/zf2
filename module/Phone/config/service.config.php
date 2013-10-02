<?php

use Zend\ServiceManager\ServiceLocatorInterface;
use Phone\Service\SoapService;

return [
    'factories' => [
        'Phone\SoapService' => function (ServiceLocatorInterface $sm) {
            return new SoapService($sm);
        },
    ],
];
