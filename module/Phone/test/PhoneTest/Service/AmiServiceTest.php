<?php

namespace PhoneTest\Service;

use Test\Bootstrap;
use PHPUnit_Framework_TestCase;

class AmiServiceTest extends  PHPUnit_Framework_TestCase
{

    public function testSomething()
    {
        $service = Bootstrap::getApplication()->getServiceManager()->get('Phone\Service\AmiService');

        try {
            $service->bridge('a', 'b');
        } catch(\Exception $e) {

        }
    }
}
