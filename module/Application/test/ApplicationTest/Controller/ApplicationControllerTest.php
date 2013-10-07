<?php

namespace ApplicationTest\Controller;

use Test\Bootstrap;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ApplicationControllerTest extends AbstractHttpControllerTestCase
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
        $this->dispatch('/application');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Application');
        $this->assertControllerName('Application\Controller\Index');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('application');
    }

}
