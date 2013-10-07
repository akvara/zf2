<?php

namespace UsersTest\Controller;

use Test\Bootstrap;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class UsersControllerTest extends AbstractHttpControllerTestCase
{
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;
    protected $traceError = true;

    public function setUp()
    {
        $this->setApplicationConfig(Bootstrap::getApplicationConfig());

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/user');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('ZFcUser');
        $this->assertControllerName('ZFcUser');
        $this->assertControllerClass('UserController');
        $this->assertMatchedRouteName('zfcuser');
    }

}
