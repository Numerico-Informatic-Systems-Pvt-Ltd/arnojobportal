<?php

namespace JobPortal\FrontBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EmployersControllerTest extends WebTestCase
{
    public function testEmployerregister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/employerRegister');
    }

    public function testEmployerlogin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/employerLogin');
    }

    public function testEmployerchangepassword()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/employerChangePassword');
    }

    public function testEmployerforgetpassword()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/employerForgetPassword');
    }

    public function testEmployerprofile()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/employerProfile');
    }

    public function testEmployerupdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/employerUpdate');
    }

}
