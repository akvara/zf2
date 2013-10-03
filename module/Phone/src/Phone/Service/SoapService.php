<?php

namespace Phone\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Phone\Service\InboundCallService;


/**
 * Disable Soap\AutoDiscover before using docstrings!
 */
class SoapService
{
    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;


    // Constructor

    public function __construct(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * inbound call method
     *
     * @param string $unique_id
     * @param string $call_id
     * @param int $destination_number
     * @param string $status
     * @param string $dialplan
     * @param string $triggered_at
     * @return string
     */
    public function inboundCall($unique_id, $call_id, $destination_number, $status, $dialplan, $triggered_at)
    {
        $service = $this->serviceLocator->get('Phone\Service\InboundCallService');

        return $service->processInboundCall($unique_id, $call_id, $destination_number, $status, $dialplan, $triggered_at);
    }

}
