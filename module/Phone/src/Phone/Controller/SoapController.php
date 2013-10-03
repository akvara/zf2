<?php

namespace Phone\Controller;

use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Soap\Server as SoapServer;
use Zend\Soap\AutoDiscover;

class SoapController extends AbstractActionController
{

    public function soapAction()
    {
        $request  = $this->getRequest();
        $response = $this->getResponse();

        if ($request->getQuery()->get('wsdl') !== null) {
            return $response->setContent($this->handleWsdlRequest());
        }

        return $response->setContent($this->handleSoapRequest());
    }

    public function testAction()
    {
        $service = $this->getServiceLocator()->get('Phone\Service\SoapService');

        $result  = $service->inboundCall(
            'unique', 'call', 200, 'CALL', 'dialplan', date(\DateTime::W3C)
        );

        var_dump($result);
        exit;
    }

    // Protected methods

    protected function handleSoapRequest()
    {
        $config = $this->getServiceLocator()->get('Config')['phoneModule'];

        $soapServer = new SoapServer($this->getWsdlUrl(), $config['soap']['options']);
        $soapServer
            ->setReturnResponse(true)
            ->setObject($this->getServiceLocator()->get('Phone\Service\InboundCallService'));

        return $soapServer->handle();
    }

    protected function handleWsdlRequest()
    {
        $autoDiscover = new AutoDiscover();
        $autoDiscover
            ->setClass(get_class($this->getServiceLocator()->get('Phone\Service\SoapService')))
            ->setUri($this->getSoapUrl())
            ->setServiceName('LEOS.CallCenter.PhoneSoap');

        return $autoDiscover->handle();
    }

    // Private methods

    private function getSoapUrl()
    {
        $uri = $this->getRequest()->getUri();

        return sprintf('%s://%s', $uri->getScheme(), $uri->getHost()) . '/phone/soap';
    }

    private function getWsdlUrl()
    {
        return $this->getSoapUrl() . '?wsdl';
    }
}
