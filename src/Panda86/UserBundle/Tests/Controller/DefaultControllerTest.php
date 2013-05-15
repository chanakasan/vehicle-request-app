<?php

namespace Panda86\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin');

        $this->assertTrue($crawler->filter('html:contains("Welcome! Admin Home")')->count() > 0);
    }
}
