<?php

namespace SortTest\Controller;

use Test\Bootstrap;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class SortControllerTest extends AbstractHttpControllerTestCase
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
        $this->dispatch('/sort');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Sort');
        $this->assertControllerName('Sort\Controller\Sort');
        $this->assertControllerClass('SortController');
        $this->assertMatchedRouteName('sort');
    }

}
