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
        $albumTableMock = $this->getMockBuilder('Album\Model\AlbumTable')
            ->disableOriginalConstructor()
            ->getMock();

        $albumTableMock->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue(array()));

        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('Album\Model\AlbumTable', $albumTableMock);

        $this->dispatch('/album');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Album');
        $this->assertControllerName('Album\Controller\Album');
        $this->assertControllerClass('AlbumController');
        $this->assertMatchedRouteName('album');
    }

    public function testAddActionCanBeAccessed()
    {
        $this->dispatch('/album/add');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Album');
        $this->assertControllerName('Album\Controller\Album');
        $this->assertControllerClass('AlbumController');
        $this->assertMatchedRouteName('album');
    }

    public function testEditActionCanBeAccessed()
    {
        $this->dispatch('/album/edit');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Album');
        $this->assertControllerName('Album\Controller\Album');
        $this->assertControllerClass('AlbumController');
        $this->assertMatchedRouteName('album');
    }

    public function testDeleteActionCanBeAccessed()
    {
        $this->dispatch('/album/delete');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Album');
        $this->assertControllerName('Album\Controller\Album');
        $this->assertControllerClass('AlbumController');
        $this->assertMatchedRouteName('album');
    }

    public function testAddActionRedirectsAfterValidPost()
    {
        $albumTableMock = $this->getMockBuilder('Album\Model\AlbumTable')
            ->disableOriginalConstructor()
            ->getMock();

        $albumTableMock->expects($this->once())
            ->method('saveAlbum')
            ->will($this->returnValue(null));

        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('Album\Model\AlbumTable', $albumTableMock);

        $postData = array('id' => '', 'title' => 'Led Zeppelin III', 'artist' => 'Led Zeppelin');
        $this->dispatch('/album/add', 'POST', $postData);
        $this->assertResponseStatusCode(302);

        $this->assertRedirectTo('/album/');
    }

//    public function testEditActionRedirectsAfterValidPost()
//    {
//        $albumTableMock = $this->getMockBuilder('Album\Model\AlbumTable')
//            ->disableOriginalConstructor()
//            ->getMock();
//
//        $albumTableMock->expects($this->once())
//            ->method('editAlbum')
//            ->will($this->returnValue(null));
//
//        $serviceManager = $this->getApplicationServiceLocator();
//        $serviceManager->setAllowOverride(true);
//        $serviceManager->setService('Album\Model\AlbumTable', $albumTableMock);
//
//        $postData = array('id' => '1', 'title' => 'Led Zeppelin III', 'artist' => 'Led Zeppelin');
//        $this->dispatch('/album/edit', 'POST', $postData);
//        $this->assertResponseStatusCode(302);
//
//        $this->assertRedirectTo('/album/');
//    }
//
//    public function testDeleteActionRedirects()
//    {
//        $albumTableMock = $this->getMockBuilder('Album\Model\AlbumTable')
//            ->disableOriginalConstructor()
//            ->getMock();
//
//        $albumTableMock->expects($this->once())
//            ->method('deleteAlbum')
//            ->will($this->returnValue(null));
//
//        $serviceManager = $this->getApplicationServiceLocator();
//        $serviceManager->setAllowOverride(true);
//        $serviceManager->setService('Album\Model\AlbumTable', $albumTableMock);
//
//        $postData = array('id' => '1');
//        $this->dispatch('/album/delete/1', 'POST', $postData);
//        $this->assertResponseStatusCode(302);
//
//        $this->assertRedirectTo('/album/');
//    }

}
