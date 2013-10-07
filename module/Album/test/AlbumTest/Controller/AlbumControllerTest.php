<?php

namespace AlbumTest\Controller;

use Test\Bootstrap;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

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

//    public function testAddActionRedirectsAfterValidPost()
//    {
//        $albumTableMock = $this->getMockBuilder('Album\Model\AlbumTable')
//            ->disableOriginalConstructor()
//            ->getMock();
//
//        $albumTableMock->expects($this->once())
//            ->method('saveAlbum')
//            ->will($this->returnValue(null));
//
//        $serviceManager = $this->getApplicationServiceLocator();
//        $serviceManager->setAllowOverride(true);
//        $serviceManager->setService('Album\Model\AlbumTable', $albumTableMock);
//
//        $postData = array('title' => 'Led Zeppelin III', 'artist' => 'Led Zeppelin');
//        $this->dispatch('/album/add', 'POST', $postData);
//        $this->assertResponseStatusCode(302);
//
//        $this->assertRedirectTo('/album');
//    }


    public function testAddActionCanBeAccessed()
    {
        $this->dispatch('/album/add');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Album');
        $this->assertControllerName('Album\Controller\Album');
        $this->assertControllerClass('AlbumController');
        $this->assertMatchedRouteName('album');
    }
//
        public function testDeleteActionCanBeAccessed()
        {
            $this->dispatch('/album/delete');
            $this->assertResponseStatusCode(200);

            $this->assertModuleName('Album');
            $this->assertControllerName('Album\Controller\Album');
            $this->assertControllerClass('AlbumController');
            $this->assertMatchedRouteName('album');
        }
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
