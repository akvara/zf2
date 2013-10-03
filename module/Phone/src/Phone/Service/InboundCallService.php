<?php

namespace Phone\Service;

use Phone\Entity\InboundCallEntity;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

/**
 * Disable Soap\AutoDiscover before using docstrings!
 */
class InboundCallService implements EventManagerAwareInterface, ServiceLocatorAwareInterface
{

    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    /**
     * @var EventManagerInterface
     */
    protected $eventManager;



    // Public methods

    public function processInboundCall($unique_id, $call_id, $destination_number, $status, $dialplan, $triggered_at)
    {
        $entityManager = $this
                ->getServiceLocator()
                    ->get('Doctrine\ORM\EntityManager');

        $callStatus = $entityManager
                ->getRepository('Phone\Entity\InboundCallStatusEntity')
                    ->findOneBy(array('name' => $status));

        if ($status == 'CALL') {
            $call = new InboundCallEntity();
            $call->setAsteriskUniqueId($unique_id);
            $call->setAsteriskCallId($call_id);
            $call->setDestinationNumber($destination_number);
            $call->setInboundCallStatus($callStatus);
            $call->setDialPlan($dialplan);
            $call->setCreatedAt(new \DateTime($triggered_at));

            // Register new event in DB
            $entityManager->persist($call);
            $entityManager->flush();

            // Notify about new event
            $this->getEventManager()->trigger('inboundCallPostPersist', $call);

            return json_encode([$unique_id, $call_id, $destination_number, $status, $dialplan, $triggered_at]);
        }
        return json_encode([$unique_id, $call_id, $destination_number, $status, $dialplan, $triggered_at]);
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



    // EventManagerAwareInterface implementation

    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->addIdentifiers(array(
            'Phone\Module',
            get_called_class()
        ));

        $this->eventManager = $eventManager;
    }

    public function getEventManager()
    {
        return $this->eventManager;
    }
}
