<?php

namespace Phone;

use Phone\Service\AmiService;
use Phone\Service\SoapService;
use Phone\Service\InboundCallService;
use Zend\ServiceManager\ServiceLocatorInterface;

return [
    'factories' => [
        __NAMESPACE__ . '\Service\SoapService' => function(ServiceLocatorInterface $sm) {

            return new SoapService($sm);
        },

        __NAMESPACE__ . '\Service\InboundCallService' => function(ServiceLocatorInterface $sm) {

            return new InboundCallService($sm);
        },

        __NAMESPACE__ . '\Service\AmiService' => function(ServiceLocatorInterface $sm) {
            $config = $sm->get('Config')['phoneModule']['asterisk'];

            return new AmiService($config);
        }
    ],
];
