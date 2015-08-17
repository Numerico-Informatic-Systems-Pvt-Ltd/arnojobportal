<?php

namespace JobPortal\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommonControllerTest extends WebTestCase
{
    public function testStatusupdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/statusUpdate');
    }

    public function testDeleteupdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteUpdate');
    }

}
