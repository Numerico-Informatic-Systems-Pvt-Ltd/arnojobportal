<?php

namespace JobPortal\FrontBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LogoutControllerTest extends WebTestCase
{
    public function testUserlogout()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/userLogout');
    }

}
