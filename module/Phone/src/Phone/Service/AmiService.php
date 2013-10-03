<?php

namespace Phone\Service;

use PAMI\Client\Impl\ClientImpl;
use PAMI\Client\Exception\ClientException;
use PAMI\Message\Action\BridgeAction;


class AmiService
{

    /**
     * @var ClientImpl
     */
    protected $amiClient;

    /**
     * @var array
     */
    protected $config;



    // Constructor

    public function __construct(Array $config)
    {
        $this->config = $config;
    }



    // Public methods

    public function bridge($cid1, $cid2)
    {
        try {
            $amiClient = $this->getAmiClient();
        } catch(ClientException $e) {
            throw $e;
        }

        try {
            $response = $amiClient->send(new BridgeAction($cid1, $cid2, true));
        } catch(ClientException $e) {
            //TODO extend and fix bugs on third party lib :)
        }

        return $response;
    }



    // Protected methods

    protected function getAmiClient()
    {
        if ($this->amiClient) {
            return $this->amiClient;
        }

        $amiClient = new ClientImpl($this->config);
        $amiClient->open();

        $this->amiClient = $amiClient;

        return $amiClient;
    }

}
