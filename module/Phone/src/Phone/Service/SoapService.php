<?php

namespace Phone\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Phone\Entity\PhoneInboundCall;
use Phone\Entity\PhoneInboundCallStatus;

/**
 * Disable Soap\AutoDiscover before using docstrings!
 */
class SoapService implements ServiceLocatorAwareInterface
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

    // Public methods

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
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $callStatus = $em->getRepository('\Phone\Entity\PhoneInboundCallStatus')->findOneBy(array('name' => $status));

        if ($status == 'CALL') {
            $call = new PhoneInboundCall();
            $call->setAsteriskUniqueId($unique_id);
            $call->setAsteriskCallId($call_id);
            $call->setDestinationNumber($destination_number);
            $call->setPhoneInboundCallStatus($callStatus);
            $call->setDialPlan($dialplan);
            $call->setCreatedAt(new \DateTime());
            $em->persist($call);
            $em->flush();

            $f=fopen("here.txt","a" );
            fputs($f,date('H:i:s'));
            fputs($f,date('H:i:s')."-->".print_r($call,true)."\n");
            fputs($f,"\n");
            fclose($f);
            return "Money";
        }

        return json_encode($unique_id, $call_id, $destination_number, $status, $dialplan, $triggered_at);
    }

    // ServiceLocatorAwareInterface implementation

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}
