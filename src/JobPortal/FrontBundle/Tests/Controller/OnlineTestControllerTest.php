<?php

namespace JobPortal\FrontBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OnlineTestControllerTest extends WebTestCase
{
    public function testFetchcategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fetchCategory');
    }

    public function testBegintest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/beginTest');
    }

    public function testTestexams()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/testExams');
    }

    public function testTestscore()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/testScore');
    }

}
