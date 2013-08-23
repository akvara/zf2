<?php

namespace Contact\Service;

use Traversable;
use Contact\Form\ContactFilter;
use Contact\Form\ContactForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayUtils;

class ContactFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $config  = $services->get('config');
        if ($config instanceof Traversable) {
            $config = ArrayUtils::iteratorToArray($config);
        }
        $name    = $config['contact']['form']['name'];
        $captcha = $services->get('ContactCaptcha');
        $filter  = new ContactFilter();
        $form    = new ContactForm($name, $captcha);
        $form->setInputFilter($filter);
        return $form;
    }
}
