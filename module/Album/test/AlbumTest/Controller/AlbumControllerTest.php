<?php

namespace AlbumTest\Controller;

use Test\Bootstrap;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

//use Album\Controller\AlbumController;
//use Zend\Http\Request;
//use Zend\Http\Response;
//use Zend\Mvc\MvcEvent;
//use Zend\Mvc\Router\RouteMatch;
//use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
//use PHPUnit_Framework_TestCase;

class AlbumControllerTest extends AbstractHttpControllerTestCase
{
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    public function setUp()
    {
        $this->setApplicationConfig(Bootstrap::getApplicationConfig());

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/album');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Album');
        $this->assertControllerName('Album\Controller\Album');
        $this->assertControllerClass('AlbumController');
        $this->assertMatchedRouteName('album');
    }

//    public function testAddActionCanBeAccessed()
//    {
//        $this->routeMatch->setParam('action', 'add');
//
//        $result   = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//
//        $this->assertEquals(200, $response->getStatusCode());
//    }
//
//    public function testDeleteActionCanBeAccessed()
//    {
//        $this->routeMatch->setParam('action', 'delete');
//        $this->routeMatch->setParam('id', '1');
//
//        $result   = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//
//        $this->assertEquals(200, $response->getStatusCode());
//    }
//
//    public function testDeleteActionRedirect()
//    {
//        $this->routeMatch->setParam('action', 'delete');
//
//        $result   = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//
//        $this->assertEquals(302, $response->getStatusCode());
//    }
//
//    public function testEditActionCanBeAccessed()
//    {
//        $this->routeMatch->setParam('action', 'edit');
//        $this->routeMatch->setParam('id', '1');//Add this Row
//
//        $result   = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//
//        $this->assertEquals(200, $response->getStatusCode());
//    }
//    public function testEditActionRedirect()
//    {
//        $this->routeMatch->setParam('action', 'edit');
//
//        $result   = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//
//        $this->assertEquals(302, $response->getStatusCode());
//    }
//    public function testIndexActionCanBeAccessed()
//    {
//        $this->routeMatch->setParam('action', 'index');
//
//        $result   = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//
//        $this->assertEquals(200, $response->getStatusCode());
//    }
//    public function testGetAlbumTableReturnsAnInstanceOfAlbumTable()
//    {
//        $this->assertInstanceOf('Album\Model\AlbumTable', $this->controller->getAlbumTable());
//    }
}
