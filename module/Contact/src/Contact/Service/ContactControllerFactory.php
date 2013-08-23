<?php

namespace Contact\Service;

use Contact\Controller\ContactController;
use Zend\Mail\Message;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ContactControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $serviceLocator = $services->getServiceLocator();
        $form           = $serviceLocator->get('ContactForm');
        $message        = $serviceLocator->get('ContactMailMessage');
        $transport      = $serviceLocator->get('ContactMailTransport');

        $controller = new ContactController();
        $controller->setContactForm($form);
        $controller->setMessage($message);
        $controller->setMailTransport($transport);
        
        return $controller;
    }
}
